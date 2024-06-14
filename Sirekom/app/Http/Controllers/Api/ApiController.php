<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class ApiController extends Controller
{


    public function edit()
    {
        $admin = Admin::all();
        return view('app.admin.api.update-admin', [
            'admin' => $admin,
        ]);
    }

    public function update(Request $request)
    {
        $token = $request->session()->get('bearer_token');
        //dd($token);
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        //dd($data);
        $url = "http://127.0.0.1:8000/api/admin/{$request->id}";
        
        $apiRequest = Request::create($url, 'PUT', $data);
        $apiRequest->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($apiRequest);
        //dd($response);
        
        if ($response->getStatusCode() == 200) {

            $responseData = json_decode($response->getContent(), true);

            return redirect('edit-admin')->with('success', "Admin berhasil diupdate!!");
        } else {
            return redirect()->back()->withErrors('Error adding Mahasiswa.');
        }
    }
}
