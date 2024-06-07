<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = [
        'username', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getAuthIdentifierName()
    {
        return 'username';
    }
    use HasFactory, HasRoles;

    protected $guarded = [
        'idAdmin',
    ];
    protected $guard_name = 'web';
}

