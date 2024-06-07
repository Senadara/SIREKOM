<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = ['idPeserta'];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'idLomba');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'idMahasiswa');
    }
}
