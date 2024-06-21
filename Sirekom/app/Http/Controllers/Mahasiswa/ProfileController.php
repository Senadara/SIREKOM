<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        //return dd($mahasiswa);
        return view('app.mahasiswa.profile', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'namaMahasiswa' => 'nullable',
            'noHP' => 'nullable',
            'fotoProfile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->password != null){
            $validatedData['password'] = Hash::make($request->password);
        }

        if ($request->hasfile('fotoProfile')) {
            $file = $request->file('fotoProfile');
            $randomString = Str::random(5);
            $filename = $randomString . '.' . $file->getClientOriginalName();
            $file->storeAs('public/img/profile', $filename);
            $validatedData['fotoProfile'] = $filename;

            $pesertas = Mahasiswa::findOrFail($id);
            if ($pesertas->fotoProfile) {
                Storage::delete('public/img/profile/' . $pesertas->fotoProfile);
            }
        }
        //dd($validatedData);
        Mahasiswa::where('id', $id)->update($validatedData);
        return redirect('/mahasiswa/profile/' . $id);
    }
}
