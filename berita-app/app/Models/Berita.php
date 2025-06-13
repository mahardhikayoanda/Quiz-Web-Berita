<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'foto',
        'user_id',
    ];

    // Relasi ke user (penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
