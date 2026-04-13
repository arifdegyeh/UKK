<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'lokasi',
        'prioritas',
        'lampiran',
        'status',
    ];

    protected $casts = [
        'lampiran' => 'array',
    ];

    /**
     * Get the siswa (student) who created this aspirasi.
     */
    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    /**
     * Get the kategori of this aspirasi.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Get feedbacks for this aspirasi.
     */
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'aspirasi_id');
    }
}
