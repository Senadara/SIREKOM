<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Mahasiswa extends Model
{
    use HasFactory, HasRoles;

    protected $guarded = ['idMahasiswa'];
    protected $attributes = [
        'fotoProfile' => 'assets/img/profile/default.jpg'
    ];
    protected $guard_name = 'web';
}
