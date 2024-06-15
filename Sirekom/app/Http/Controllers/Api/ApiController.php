<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{


    public function edit()
    {
        return view('app.admin.api.update-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'username' => 'required|string|max:50|unique:admins,username',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->post('idAdmin', Auth::guard('admin')->user()->id);

            // Membuat permintaan internal ke endpoint API untuk mendapatkan token JWT
            $internalRequest = Request::create('http://127.0.0.1:8000/api/admin', 'POST', [
                'username' => $credentials['username'],
                'password' => $credentials['password'],
            ]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'username' => 'required|max:20|unique:admins,username',
            'password' => 'required|min:8',
        ]);


        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $client = new Client();
        $url = "localhost/laravel10PassportJWT/public/api/admin/";

        $params = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $response = $client->request("POST", $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . session('JWT_TOKEN')
            ],
            'form_params' => $params
        ]);

        $data = json_decode($response->getBody()->getContents());
        return redirect('students')
            ->with('status', 'Mahasiswa berhasil ditambahkan.');

    }
}