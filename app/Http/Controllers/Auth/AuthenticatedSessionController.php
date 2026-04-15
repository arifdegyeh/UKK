<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function create(): View
    {
        return view('login');
    }

    /**
     * Proses login
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // proses autentikasi
        $request->authenticate();

        // regenerate session (security)
        $request->session()->regenerate();

        $user = $request->user();

        // 🔥 redirect berdasarkan role TANPA intended()
        if ($user->role === 'admin') {
            return redirect()->route('dashboard.admin');
        }

        return redirect()->route('dashboard.siswa');
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}