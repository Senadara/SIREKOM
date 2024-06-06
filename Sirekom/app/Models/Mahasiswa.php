<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['idMahasiswa'];

    protected $attributes = [
        'fotoProfile' => 'assets/img/profile/default.jpg'
    ];
}
