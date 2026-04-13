<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\Feedback;

class AspirasiController extends Controller
{
    /**
     * Show the admin aspirasi management page.
     */
    public function adminIndex()
    {
        $aspirasis = Aspirasi::with(['siswa', 'kategori', 'feedbacks'])->latest()->get();
        return view('admin.aspirasi', compact('aspirasis'));
    }

    /**
     * Show student aspirasi creation form.
     */
    public function createForm()
    {
        $kategoris = Kategori::all();
        return view('siswa.aspirasi-create', compact('kategoris'));
    }

    /**
     * Store a new aspirasi (from student form).
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'lokasi' => 'required|string|max:255',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'deskripsi' => 'required|string|max:1000',
            'lampiran.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $lampiranPaths = [];

        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $lampiranPaths[] = $file->store('aspirasi-lampiran', 'public');
            }
        }

        Aspirasi::create([
            'siswa_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'prioritas' => $request->prioritas,
            'deskripsi' => $request->deskripsi,
            'lampiran' => count($lampiranPaths) > 0 ? $lampiranPaths : null,
        ]);

        return redirect()->route('dasboard.siswa')->with('success', 'Aspirasi berhasil dikirim!');
    }

    /**
     * Show list of aspirasi for student (Aspirasi Saya).
     */
    public function index()
    {
        $aspirasis = Aspirasi::with(['kategori', 'feedbacks.admin'])
            ->where('siswa_id', auth()->id())
            ->latest()
            ->get();
        return view('siswa.aspirasi-saya', compact('aspirasis'));
    }

    /**
     * Update status of an aspirasi (admin action).
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->update(['status' => $request->status]);

        return redirect()->route('admin.aspirasi')->with('success', 'Status aspirasi berhasil diubah menjadi ' . ucfirst($request->status) . '!');
    }

    /**
     * Store feedback for an aspirasi (admin action).
     */
    public function storeFeedback(Request $request, $aspirasiId)
    {
        $request->validate([
            'komentar' => 'required|string|max:1000',
        ]);

        $aspirasi = Aspirasi::findOrFail($aspirasiId);

        Feedback::create([
            'aspirasi_id' => $aspirasi->id,
            'admin_id' => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('admin.aspirasi')->with('success', 'Feedback berhasil diberikan!');
    }

    /**
     * Delete a feedback.
     */
    public function destroyFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('admin.aspirasi')->with('success', 'Feedback berhasil dihapus.');
    }
}
