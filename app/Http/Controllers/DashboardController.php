<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aspirasi;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Feedback;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalAspirasi = Aspirasi::count();
        $pendingAspirasi = Aspirasi::where('status', 'pending')->count();
        $prosesAspirasi = Aspirasi::where('status', 'proses')->count();
        $selesaiAspirasi = Aspirasi::where('status', 'selesai')->count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalKategori = Kategori::count();
        $aspirasiTerbaru = Aspirasi::with(['siswa', 'kategori'])->latest()->take(5)->get();

        return view('admin.dasboard', compact(
            'totalAspirasi',
            'pendingAspirasi',
            'prosesAspirasi',
            'selesaiAspirasi',
            'totalSiswa',
            'totalKategori',
            'aspirasiTerbaru'
        ));
    }

    /**
     * Display the authenticated user's dashboard based on role.
     */
    public function dashboard()
    {
        $user = Auth::user();

        return $user->role === 'admin'
            ? $this->index()
            : $this->siswa();
    }

    /**
     * Display the student dashboard.
     */
    public function siswa()
    {
        $user = Auth::user();
        $totalAspirasi = Aspirasi::where('siswa_id', $user->id)->count();
        $pendingAspirasi = Aspirasi::where('siswa_id', $user->id)->where('status', 'pending')->count();
        $prosesAspirasi = Aspirasi::where('siswa_id', $user->id)->where('status', 'proses')->count();
        $selesaiAspirasi = Aspirasi::where('siswa_id', $user->id)->where('status', 'selesai')->count();
        $aspirasiTerbaru = Aspirasi::with(['kategori'])
            ->where('siswa_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('siswa.dashboard', compact(
            'totalAspirasi',
            'pendingAspirasi',
            'prosesAspirasi',
            'selesaiAspirasi',
            'aspirasiTerbaru'
        ));
    }

    /**
     * Display the notification page for students.
     */
    public function notifikasi()
    {
        $user = Auth::user();
        $aspirasiList = Aspirasi::with(['kategori', 'feedbacks.admin'])
            ->where('siswa_id', $user->id)
            ->latest('updated_at')
            ->get();

        return view('siswa.notifikasi', compact('aspirasiList'));
    }

    /**
     * Display the profile page for students.
     */
    public function profil()
    {
        $user = Auth::user();
        $totalAspirasi = Aspirasi::where('siswa_id', $user->id)->count();
        $pendingAspirasi = Aspirasi::where('siswa_id', $user->id)->where('status', 'pending')->count();
        $prosesAspirasi = Aspirasi::where('siswa_id', $user->id)->where('status', 'proses')->count();
        $selesaiAspirasi = Aspirasi::where('siswa_id', $user->id)->where('status', 'selesai')->count();

        return view('siswa.profil', compact(
            'user',
            'totalAspirasi',
            'pendingAspirasi',
            'prosesAspirasi',
            'selesaiAspirasi'
        ));
    }

    /**
     * Display admin reports page.
     */
    public function laporan()
    {
        // Aspirasi stats
        $totalAspirasi = Aspirasi::count();
        $pendingAspirasi = Aspirasi::where('status', 'pending')->count();
        $prosesAspirasi = Aspirasi::where('status', 'proses')->count();
        $selesaiAspirasi = Aspirasi::where('status', 'selesai')->count();
        $ditolakAspirasi = Aspirasi::where('status', 'ditolak')->count();

        // Aspirasi by category (using relationship)
        $aspirasiByKategori = Kategori::withCount('aspirasis')
            ->orderByDesc('aspirasis_count')
            ->get();

        // Aspirasi by priority
        $aspirasiByPrioritas = Aspirasi::selectRaw('prioritas, count(*) as total')
            ->groupBy('prioritas')
            ->orderByDesc('total')
            ->get();

        // User stats
        $totalSiswa = User::where('role', 'siswa')->count();

        // Recent aspirasi with relationships
        $recentAspirasi = Aspirasi::with(['siswa', 'kategori'])->latest()->take(10)->get();

        // Aspirasi this month
        $aspirasiThisMonth = Aspirasi::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Total feedback
        $totalFeedback = Feedback::count();

        return view('admin.laporan', compact(
            'totalAspirasi',
            'pendingAspirasi',
            'prosesAspirasi',
            'selesaiAspirasi',
            'ditolakAspirasi',
            'aspirasiByKategori',
            'aspirasiByPrioritas',
            'totalSiswa',
            'recentAspirasi',
            'aspirasiThisMonth',
            'totalFeedback'
        ));
    }
}
