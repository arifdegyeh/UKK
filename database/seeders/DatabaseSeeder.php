<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);



        // Create default categories
        $kategoris = [
            ['nama' => 'Fasilitas Sekolah', 'deskripsi' => 'Aspirasi terkait fasilitas dan infrastruktur sekolah'],
            ['nama' => 'Kegiatan Belajar', 'deskripsi' => 'Aspirasi terkait proses kegiatan belajar mengajar'],
            ['nama' => 'Ekstrakurikuler', 'deskripsi' => 'Aspirasi terkait kegiatan ekstrakurikuler'],
            ['nama' => 'Kantin', 'deskripsi' => 'Aspirasi terkait kantin dan makanan di sekolah'],
            ['nama' => 'Kebersihan', 'deskripsi' => 'Aspirasi terkait kebersihan lingkungan sekolah'],
            ['nama' => 'Keamanan', 'deskripsi' => 'Aspirasi terkait keamanan di lingkungan sekolah'],
            ['nama' => 'Lainnya', 'deskripsi' => 'Aspirasi lain yang tidak termasuk kategori di atas'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
