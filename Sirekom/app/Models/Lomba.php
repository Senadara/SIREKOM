<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaLomba',
        'deskripsiLomba',
        'tanggalPendaftaran',
        'posterLomba',
        'lampiran',
    ];
}
