<?php

namespace App\Http\Controllers\Api;

use App\Models\Lomba;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PesertaExport;

class PesertaController extends Controller
{
    public function memanggilAPIGetAlldata($idLomba = null)
    {
        // Buat URL API berdasarkan apakah idLomba diberikan atau tidak
        $url = $idLomba ? "http://127.0.0.1:8000/api/peserta/{$idLomba}" : 'http://127.0.0.1:8000/api/peserta';

        // Buat instance dari Request dan dapatkan respons
        $apiRequest = Request::create($url, 'GET');
        $response = app()->handle($apiRequest);
        $lombas = Lomba::all();

        if ($response->getStatusCode() === 200) {
            $jsonData = json_decode($response->getContent(), true);
            $pesertas = array_map(fn ($item) => (object) $item, $jsonData['data']);

            return view('app.admin.list-peserta-lomba', [
                'pesertas' => $pesertas,
                'lombas' => $lombas,
                'idLomba' => $idLomba,
            ]);
        }

        return response()->json(['error' => 'Failed to fetch data'], $response->getStatusCode());
    }

    public function export_excel($idLomba = null)
    {

        return Excel::download(new PesertaExport($idLomba), 'peserta.xlsx');
    }
}
