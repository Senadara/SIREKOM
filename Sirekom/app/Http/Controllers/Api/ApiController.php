<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class ApiController extends Controller
{


    public function edit()
    {
        $admin = Admin::all();
        return view('app.admin.api.update-admin', [
            'admin' => $admin,
        ]);
    }


    public function create()
    {
        return view('app.admin.api.create-admin', []);
    }

    public function store(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'username' => 'required|max:20|unique:admins,username',
            'password' => 'required|min:8',
        ]);

        // Get the token from the session
        $token = $request->session()->get('bearer_token');

        // Define the API URL
        $url = "http://127.0.0.1:8000/api/admin/";

        // Create a new Request for the API call with the original request data
        $apiRequest = Request::create($url, 'POST', $request->all());
        $apiRequest->headers->set('Authorization', 'Bearer ' . $token);

        // Handle the request and get the response
        $response = app()->handle($apiRequest);
        // dd($response);

        // Check the response status code
        if ($response->getStatusCode() == 201) {
            // Decode the JSON response to an object
            $jsonData = json_decode($response->getContent(), false);

            return redirect('create-admin')->with('success', "Admin berhasil ditambah!!");

            // Return the view with the necessary data
            // return view('app.admin.api.create-admin', [
            //     // Add any required data here, for example:
            //     // 'admin' => $jsonData->admin,
            // ]);
        } else {
            // Return an unauthorized response
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
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
