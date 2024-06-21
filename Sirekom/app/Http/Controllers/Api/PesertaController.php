<?php

namespace App\Http\Controllers\Api;

use App\Models\Lomba;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Exports\PesertaExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    public function memanggilAPIGetAlldata(Request $request, $idLomba = null)
    {
        $token = $request->session()->get('bearer_token');
        // dd($token);
        $lombas = Lomba::all();
        $url = $idLomba ? "http://127.0.0.1:8000/api/peserta/{$idLomba}" : 'http://127.0.0.1:8000/api/peserta';
        // Buat permintaan ke API dengan menyertakan token di header
        $apiRequest = Request::create($url, 'GET');
        $apiRequest->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($apiRequest);
        // dd($response);

        if ($response->getStatusCode() == 200) {
            // Mengubah data JSON menjadi objek
            $jsonData = json_decode($response->getContent(), false);
            $pesertas = array_map(fn ($item) => (object) $item, $jsonData->data);

            return view('app.admin.list-peserta-lomba', [
                'pesertas' => $pesertas,
                'lombas' => $lombas,
                'idLomba' => $idLomba,
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function export_excel($idLomba = null)
    {

        return Excel::download(new PesertaExport($idLomba), 'peserta.xlsx');
    }
}
