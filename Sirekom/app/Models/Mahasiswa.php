<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Mahasiswa extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guarded = ['id'];
    protected $attributes = [
        'fotoProfile' => 'assets/img/profile/default.jpg'
    ];
    protected $guard_name = 'mahasiswa';
}
