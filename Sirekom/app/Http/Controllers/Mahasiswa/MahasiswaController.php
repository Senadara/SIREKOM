<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Lomba;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $lomba = Lomba::all();
        return view('app.mahasiswa.data-lomba', [
            'lombas' => $lomba
        ]);
    }

    public function edit()
    {
        // add view edit
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'namaMahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'nim' => 'required|digits:10|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan' => 'required',
            'angkatan' => 'required',
            'noHP' => 'required|digits_between:11,12|unique:mahasiswas,nohp,' . $mahasiswa->id,
            'fotoProfile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mahasiswa = Mahasiswa::find($mahasiswa->id);

        // Mengecek Apakah Terdapat File foto yang baru
        if ($request->hasFile('fotoProfile')) {
            // Menghapus foto lama apabila terdapat foto yang baru
            if ($mahasiswa->foto) {
                Storage::delete('public/assets/img/profile' . $mahasiswa->fotoProfile);
            }

            // Menyimpan foto yang baru
            $file = $request->file('fotoProfile');
            $randomString = Str::random(10);
            $name_file = $randomString . "_" . $file->getClientOriginalName();
            $file->storeAs('public/assets/img/profile', $name_file);
            $validatedData['fotoProfile'] = $name_file;
        }

        $mahasiswa->update($validatedData);
        return redirect('/mahasiswa/lomba');
    }
    public function show(Lomba $lomba)
    {
        return view("app.mahasiswa.detailLomba", ["lomba" => $lomba]);
    }
}
