<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lomba;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Exports\PesertaExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    public function index($idLomba = null)
    {
        $query = DB::table('pesertas')
            ->join('mahasiswas', 'pesertas.idMahasiswa', '=', 'mahasiswas.id')
            ->join('lombas', 'pesertas.idLomba', '=', 'lombas.id')
            ->select('mahasiswas.nim', 'mahasiswas.jurusan', 'mahasiswas.angkatan', 'mahasiswas.namaMahasiswa', 'lombas.namaLomba');

        if ($idLomba) {
            $query->where('pesertas.idLomba', $idLomba);
        }

        $pesertas = $query->paginate(5);

        return view('app.admin.list-peserta-lomba', [
            'pesertas' => $pesertas,
            'idLomba' => $idLomba,
        ]);
    }


    public function export_excel($idLomba = null)
    {
        // dd($idLomba);
        return Excel::download(new PesertaExport($idLomba), 'peserta.xlsx');
    }
}
