<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:8',
            'namaMahasiswa' => 'required|string|max:255',
            'email' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@student\.telkomuniversity\.ac\.id$/'],
            'nim' => 'required|string|max:11',
            'jurusan' => 'required|string|max:100',
            'noHP' => 'required|string|max:12',
        ]);

        $year = substr($request->nim, 4, 2);
        $angkatan = '20' . $year;

        $validatedData['password'] =  Hash::make($request->password);
        $validatedData['angkatan'] = $angkatan;
        $validatedData['fotoProfile'] = 'assets/img/profile/default.jpg';

        // dd($validatedData);
        // $mahasiswa = Mahasiswa::create($validatedData);

        // return redirect('/')->with('success', 'Anda Berhasil Daftar');

        return redirect()->route('api.register.validate', ['nama' => $validatedData['namaMahasiswa']]);

        // return response()->json($validatedData);
    }

    public function save(Request $request)
    {
        $validatedData = $request->except('_token');

        $validatedData['password'] = bcrypt($validatedData['password']);
        $year = substr($request->nim, 4, 2);
        $angkatan = '20' . $year;
        $validatedData['angkatan'] = $angkatan;
        $validatedData['fotoProfile'] = 'assets/img/profile/default.jpg';

        // dd($validatedData);
        Mahasiswa::create($validatedData);
        return redirect('/')->with('success', 'Berhasil Registrasi.');
    }
}
