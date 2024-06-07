<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['idMahasiswa'];

    protected $attributes = [
        'fotoProfile' => 'assets/img/profile/default.jpg'
    ];

    public function pesertas()
    {
        return $this->hasMany(Peserta::class, 'idMahasiswa');
    }
}
