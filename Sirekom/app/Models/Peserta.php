<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Peserta extends Model
{
    use HasFactory, HasRoles;

    protected $guarded = ['id'];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'idLomba');
    }
    protected $guard_name = 'web';
}
