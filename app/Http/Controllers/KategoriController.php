<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display list of kategori (admin).
     */
    public function index()
    {
        $kategoris = Kategori::withCount('aspirasis')->latest()->get();
        return view('admin.kategori', compact('kategoris'));
    }

    /**
     * Store a new kategori.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategoris,nama',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Update a kategori.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategoris,nama,' . $id,
            'deskripsi' => 'nullable|string|max:500',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Delete a kategori.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
