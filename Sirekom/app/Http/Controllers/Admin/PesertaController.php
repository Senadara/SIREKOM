<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Peserta as PesertaResources;

class PesertaController extends BaseController
{
    public function index(Request $request, $idLomba = null)
    {
        //query get semua peserta
        $query = DB::table('pesertas')
            ->join('mahasiswas', 'pesertas.idMahasiswa', '=', 'mahasiswas.id')
            ->join('lombas', 'pesertas.idLomba', '=', 'lombas.id')
            ->select('mahasiswas.nim', 'mahasiswas.jurusan', 'mahasiswas.angkatan', 'mahasiswas.namaMahasiswa', 'lombas.namaLomba');

        //cek apakah ada idLomba yang dikirim 
        if ($idLomba) {
            //filter peserta by idLombanya
            $query->where('pesertas.idLomba', $idLomba);
        }

        //get semua data
        $pesertas = $query->get();

        //cek apakah request ajax ada atau tidak
        if ($request->ajax()) {
            //jika ada maka return json peserta
            return response()->json(['pesertas' => $pesertas]);
        }

        return $this->sendResponse(PesertaResources::collection($pesertas), "Berhasil Get");
    }
}
