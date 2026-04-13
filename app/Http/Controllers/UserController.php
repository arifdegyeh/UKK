<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Update user profile photo.
     */
    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = auth()->user();

        // Delete old photo if it exists
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        // Store new photo
        $path = $request->file('foto')->store('profile-photos', 'public');

        // Update user
        $user->update(['foto' => $path]);

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    /**
     * Display admin users management page.
     */
    public function index()
    {
        $users = User::where('role', 'siswa')->latest()->get();
        $totalUsers = User::where('role', 'siswa')->count();
        $activeUsers = $totalUsers; // Assuming all are active for now
        $newUsers = User::where('role', 'siswa')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        return view('admin.users', compact('users', 'totalUsers', 'activeUsers', 'newUsers'));
    }

    /**
     * Store a new siswa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nis' => 'nullable|string|max:50|unique:users,nis',
            'kelas' => 'nullable|string|max:50',
            'no_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:500',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.users')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Delete a user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Siswa berhasil dihapus.');
    }
}
