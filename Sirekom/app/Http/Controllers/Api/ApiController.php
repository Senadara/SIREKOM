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


public function edit(){
    return view('app.admin.api.update-admin');
}
    
public function update(Request $request){
    $request->validate([
        'id' => 'required',
        'username' => 'required|max:20|unique:admins,username',
        'password' => 'required|min:8',
        ]);
        
        
        $data = [
            'username' => $request->username,
            'password' =>  $request->password,
        ];
        
        $client = new Client();   
        $url = "localhost/laravel10PassportJWT/public/api/admin/";    

        $params =  [
            'username' => $request->username,
            'password' =>  $request->password,
        ];

        $response = $client->request("POST", $url, [
            'headers'=> [
                'Authorization' => 'Bearer '.session('JWT_TOKEN')
            ],
            'form_params' => $params
        ]);

        $data = json_decode($response->getBody()->getContents());
        return redirect('students')
        ->with('status','Mahasiswa berhasil ditambahkan.');

    }
}