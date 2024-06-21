<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;
    protected $table = 'admins';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getAuthIdentifierName()
    {
        return 'username';
    }

    protected $guarded = [
        'idAdmin',
    ];
    protected $guard_name = 'admin';
}
