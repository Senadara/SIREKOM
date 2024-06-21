<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function validation(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:mahasiswas,username',
            'password' => 'required|min:8',
            'namaMahasiswa' => 'required|string|max:255',
            'email' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@student\.telkomuniversity\.ac\.id$/', 'unique:mahasiswas,email'],
            'nim' => 'required|string|max:11|unique:mahasiswas,nim',
            'jurusan' => 'required|string|max:100',
            'noHP' => 'required|string|max:12',
        ]);
        $nama = $request->input('namaMahasiswa');

        $response = Http::get("https://api-frontend.kemdikbud.go.id/hit_mhs/" . $nama);
        $data = $response->json();

        $filterByName = function ($data) use ($nama) {
            return strpos(strtolower($data['text']), strtolower($nama)) !== false;
        };

        $filteredData = array_filter($data['mahasiswa'], $filterByName);
        $firstMatch = array_values($filteredData)[0];
        // dd($firstMatch['text']);

        if ($firstMatch['text'] != "Cari kata kunci $nama pada Data Mahasiswa") {
            $mahasiswaText = $firstMatch['text'];
            // dd($mahasiswaText);
            $buttonDisabled = false;
            return view('app.mahasiswa.registerValidation', [
                'mahasiswaText' => $mahasiswaText,
                'validatedData' => $request->all(),
                'buttonDisabled' => $buttonDisabled
            ]);
        } else {
            $mahasiswaText = "Data Tidak Ditemukan";
            $buttonDisabled = true;
            return view('app.mahasiswa.registerValidation', [
                'mahasiswaText' => $mahasiswaText,
                'validatedData' => $request->all(),
                'buttonDisabled' => $buttonDisabled
            ]);
        }
    }
}
