<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'aspirasi_id',
        'admin_id',
        'komentar',
    ];

    /**
     * Get the aspirasi this feedback belongs to.
     */
    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'aspirasi_id');
    }

    /**
     * Get the admin who gave this feedback.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
