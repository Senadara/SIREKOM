<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $fillable = [
        'idAdmin',
        'namaLomba',
        'deskripsiLomba',
        'tanggalBukaPendaftaran',
        'tanggalTutupPendaftaran',
        'posterLomba',
        'lampiran'
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'idLomba');
    }
}
