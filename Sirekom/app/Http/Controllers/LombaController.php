<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{

    public function index()
    {
        $lomba = Lomba::all();
        return view('app.admin.list-lomba', [
            'lombas' => $lomba
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //ini manual biar bisa berjalan 
        $idAdmin = 1; // masih belum selesai

        // validasi data form yang dikirimkan oleh user
        $request->validate([
            'namaLomba' => 'required|max:50',
            'deskripsiLomba' => 'required',
            'tanggalPendaftaran' => 'required|date',
            'posterLomba' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lampiran' => 'required|file|max:10240|mimes:pdf,docx,doc'
        ]);

        //cek apakah filenya ada 
        if ($request->hasFile('posterLomba')) {
            // ambil file yang keynya posterLomba dan masukkan ke dalam folder posters 
            $posterLombaPath = $request->file('posterLomba')->store('posters', 'public');
        }

        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampirans', 'public');
        }

        //memasukkan input an user ke dalam model Lomba
        $lomba = new Lomba();
        $lomba->idAdmin = $idAdmin;
        $lomba->namaLomba = $request->namaLomba;
        $lomba->deskripsiLomba = $request->deskripsiLomba;
        $lomba->tanggalPendaftaran = $request->tanggalPendaftaran;
        $lomba->posterLomba = $posterLombaPath;
        $lomba->lampiran = $lampiranPath;
        $lomba->save(); //memasukkan data yang ada di dalam model ke dalam database

        //redirect ke /lomba
        return redirect('/lomba')->with('success', "Lomba berhasil ditambahkan!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Lomba $lomba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lomba $lomba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lomba $lomba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lomba $lomba)
    {
        //
    }
}
