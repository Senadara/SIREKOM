<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Lomba;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index()
    {
        $lomba = Lomba::all();
        return view('app.mahasiswa.data-lomba', [
            'lombas' => $lomba
        ]);
    }

    public function show(Lomba $lomba)
    {
        
        return view("app.mahasiswa.detailLomba", ["lomba" => $lomba]);
    }

}
