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
        return view('app.admin.api.update-admin');
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'id' => 'required',
            'username' => 'required|max:20|unique:admins,username',
            'password' => 'required|min:8',
        ]);

        // Data to be sent in the internal request
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Create a new internal request
        $internalRequest = Request::create('http://127.0.0.1:8000/api/admin/', 'POST', $data);
        $internalRequest->headers->set('Authorization', 'Bearer ' . session('jwt_token'));

        // Dispatch the request
        $response = Route::dispatch($internalRequest);

        // Handle the response
        if ($response->isSuccessful()) {
            // Decode the response data
            $responseData = json_decode($response->getContent(), true);

            // Redirect with a success message
            return redirect('students')
                ->with('status', 'Mahasiswa berhasil ditambahkan.');
        } else {
            // Handle error response
            return redirect()->back()->withErrors('Error adding Mahasiswa.');
        }
    }
}
