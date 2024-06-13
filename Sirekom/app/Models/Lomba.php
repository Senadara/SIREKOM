<?php

namespace App\Models;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function task()
    {
        return $this->hasMany(Task::class, 'idLomba');
    }

}
