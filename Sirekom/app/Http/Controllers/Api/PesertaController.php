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
        $lombas = Lomba::all();
        $url = $idLomba ? "http://127.0.0.1:8000/api/peserta/{$idLomba}" : 'http://127.0.0.1:8000/api/peserta';
        // Buat permintaan ke API dengan menyertakan token di header
        $apiRequest = Request::create($url, 'GET');
        $apiRequest->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($apiRequest);

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

    // public function memanggilAPIGetAlldata(Request $request, $idLomba = null)
    // {
    //     $token = $request->session()->get('jwt_token');

    //     dd($token);

    //     // Buat URL API berdasarkan apakah idLomba diberikan atau tidak
    //     $url = $idLomba ? "http://127.0.0.1:8000/api/peserta/{$idLomba}" : 'http://127.0.0.1:8000/api/peserta';

    //     // Buat instance Guzzle Client
    //     $client = new Client();

    //     try {
    //         // Buat permintaan ke API dengan menyertakan token di header
    //         $response = $client->request('GET', $url, [
    //             'headers' => [
    //                 'Authorization' => 'Bearer ' . $token,
    //                 'Accept' => 'application/json',
    //             ]
    //         ]);

    //         $statusCode = $response->getStatusCode();

    //         if ($statusCode === 200) {
    //             $jsonData = json_decode($response->getBody(), true);
    //             $pesertas = array_map(fn ($item) => (object) $item, $jsonData['data']);
    //             $lombas = Lomba::all();

    //             return view('app.admin.list-peserta-lomba', [
    //                 'pesertas' => $pesertas,
    //                 'lombas' => $lombas,
    //                 'idLomba' => $idLomba,
    //             ]);
    //         } else {
    //             return response()->json(['error' => 'Failed to fetch data'], $statusCode);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // public function generateTheToken()
    // {
    //     $client = new Client();
    //     $url = "http://127.0.0.1:8000/api/login";

    //     $params =  [
    //         'username' => "andry",
    //         'password' => "gemes",
    //     ];

    //     $response = $client->request("POST", $url, [
    //         'form_params' => $params
    //     ]);

    //     $data = json_decode($response->getBody()->getContents());
    //     session(['jwt_token' => $data->authorisation->token]);
    //     return session('jwt_token');
    // }

    // public function memanggilAPIGetAlldata()

    // {
    //     // dd(session('jwt_token'));
    //     $client = new Client();
    //     $url = "http://127.0.0.1:8000/api/peserta";
    //     $response = $client->get($url, [
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('jwt_token')
    //         ]
    //     ]);

    //     $data = json_decode($response->getBody()->getContents());
    //     dd($data);
    //     session(['jwt_token' => $data->authorisation->token]);
    //     return session('jwt_token');
    // }

    // public function memanggilAPIGetAlldata()
    // {
    //     $token = "2|G8qo4aOFDHVwPHAbpt5wAZzpzXB9mHqZd9iqdmaSc51a89b5";
    //     $response = Http::withHeaders([
    //         'Accept' => 'application/json',
    //         'Authorization' => 'Bearer ' . $token
    //     ])
    //         ->get('http://127.0.0.1:8000/api/peserta');

    //     $jsonData = $response->json();

    //     return response()->json($jsonData, $response->getStatusCode());
    // }



    // public function memanggilAPIGetAlldata(Request $request)
    // {
    //     // Ambil token dari session
    //     $token = $request->session()->get('jwt_token');
    //     $url = 'http://127.0.0.1:8000/api/peserta';
    // }

    public function export_excel($idLomba = null)
    {

        return Excel::download(new PesertaExport($idLomba), 'peserta.xlsx');
    }
}
