<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Pesertas;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(Request $request, $id)
    {
        $mahasiswa = User::find($id);
        return view('app.mahasiswa.profile', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'nullable',
            'noHP' => 'nullable',
            'fotoProfile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasfile('fotoProfile')) {
            $file = $request->file('fotoProfile');
            $randomString = Str::random(5);
            $filename = $randomString . '.' . $file->getClientOriginalName();
            $file->storeAs(public_path('assets/img/profile/'));
            $validatedData['fotoProfile'] = $filename;

            $pesertas = Pesertas::findOrFail($id);
            if ($pesertas->fotoProfile) {
                Storage::delete(public_path('assets/img/profile/' . $pesertas->fotoprofile));
            }
        }

        Pesertas::where('id', $id)->update($validatedData);
        return redirect('/mahasiswa/profile');
    }
}
