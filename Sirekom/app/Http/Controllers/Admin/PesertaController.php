<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::paginate(5);
        return view('app.admin.list-peserta-lomba', [
            'pesertas' => $pesertas
        ]);
    }
}
