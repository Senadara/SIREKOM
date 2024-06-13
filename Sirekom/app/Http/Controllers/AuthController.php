<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function RoleAuth(Request $request)
    {   
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('idAdmin', Auth::guard('admin')->user()->id);
            return redirect()->intended('/admin/dashboard');
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
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}
