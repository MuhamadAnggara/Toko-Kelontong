<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe' // e.g. 'info' = biru, 'success' = hijau, 'warning' = merah
    ];
}
