<?php

namespace App\Http\Controllers\Admin;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = DB::table('pesertas')
            ->join('mahasiswas', 'pesertas.idMahasiswa', '=', 'mahasiswas.id')
            ->join('lombas', 'pesertas.idLomba', '=', 'lombas.id')
            ->select('mahasiswas.nim', 'mahasiswas.jurusan', 'mahasiswas.angkatan', 'mahasiswas.namaMahasiswa', 'lombas.namaLomba')
            ->paginate(2);

        return view('app.admin.list-peserta-lomba', [
            'pesertas' => $pesertas
        ]);
    }
}
