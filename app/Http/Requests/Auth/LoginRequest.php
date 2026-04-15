<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nis' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // 🔥 CEK LOGIN SISWA (pakai NIS)
        if ($this->filled('nis')) {
            $credentials = [
                'nis' => $this->nis,
                'password' => $this->password,
                'role' => 'siswa',
            ];
        }
        // 🔥 CEK LOGIN ADMIN (pakai EMAIL)
        else {
            $credentials = [
                'email' => $this->email,
                'password' => $this->password,
                'role' => 'admin',
            ];
        }

        if (!Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'Login gagal, cek lagi data lu.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => "Terlalu banyak percobaan. Coba lagi dalam $seconds detik.",
        ]);
    }

    public function throttleKey(): string
    {
        return Str::lower(($this->nis ?? $this->email) . '|' . $this->ip());
    }
}