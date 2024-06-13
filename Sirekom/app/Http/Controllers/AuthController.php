<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function RoleAuth(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('idAdmin', Auth::guard('admin')->user()->id);

            $internalRequest = Request::create('http://127.0.0.1:8000/api/login', 'POST', [
                'username' => $credentials['username'],
                'password' => $credentials['password'],
            ]);

            $internalRequest->headers->set('Accept', 'application/json');

            $response = app()->handle($internalRequest);

            $status = $response->getStatusCode();
            $data = json_decode($response->getContent());
            // dd($data);

            if ($status == 200 && isset($data->authorisation->token)) {
                $token = $data->authorisation->token;

                $request->session()->put('jwt_token', $token);

                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to get JWT token from API']);
            }
        }
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            $mahasiswaId = Auth::guard('mahasiswa')->user()->id;
            $request->session()->put('idMahasiswa', $mahasiswaId);
            return redirect()->intended('/mahasiswa/lomba');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // menginvalidasi token jwt
        if (Auth::guard('api')->check()) {
            Auth::guard('api')->logout();
        }

        // menginvalidasi session
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/');
    }
}
