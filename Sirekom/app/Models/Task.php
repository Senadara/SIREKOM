<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'idLomba',
        'namaTask',
        'tipe',
        'deskripsiTask',
        'deadlineTask',
        'lampiran'
    ];

    // Mendefinisikan hubungan ke model Lomba
    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'idLomba');
    }
}
