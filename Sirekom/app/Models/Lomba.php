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

    // Mendefinisikan hubungan satu ke banyak
    public function tasks()
    {
        return $this->hasMany(Task::class, 'idLomba');
    }
}
