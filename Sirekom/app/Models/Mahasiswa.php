<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Mahasiswa extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $table = 'mahasiswas';

    protected $guarded = ['id'];
    protected $attributes = [
        'fotoProfile' => 'assets/img/profile/default.jpg'
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'idLomba');
    }

    protected $guard_name = 'mahasiswa';
}
