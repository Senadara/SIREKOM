<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lomba;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            'tanggalBukaPendaftaran' => 'required|date',
            'tanggalTutupPendaftaran' => 'required|date|after:tanggalBukaPendaftaran',
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
        $lomba->tanggalBukaPendaftaran = $request->tanggalBukaPendaftaran;
        $lomba->tanggalTutupPendaftaran = $request->tanggalTutupPendaftaran;
        $lomba->posterLomba = $posterLombaPath;
        $lomba->lampiran = $lampiranPath;
        $lomba->save(); //memasukkan data yang ada di dalam model ke dalam database

        //redirect ke /lomba
        return redirect('admin/lomba')->with('success', "Lomba berhasil ditambahkan!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Lomba $lomba)
    {
        return view("app.admin.detailLomba", ["lomba" => $lomba]);
        //yemima ubah
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lomba $lomba)
    {
        return view("app.admin.edit-lomba", ["lomba" => $lomba]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lomba $lomba)
    {
        $idAdmin = 1;
        $request->validate([
            'namaLomba' => 'required|max:50',
            'deskripsiLomba' => 'required',
            'tanggalBukaPendaftaran' => 'required|date',
            'tanggalTutupPendaftaran' => 'required|date|after:tanggalBukaPendaftaran',
            'posterLomba' => 'image|mimes:jpeg,png,jpg|max:2048',
            'lampiran' => 'file|max:10240|mimes:pdf,docx,doc'
        ]);

        //cek apakah filenya ada
        if ($request->hasFile('posterLomba')) {
            if ($lomba->posterLomba) {
                Storage::disk('public')->delete($lomba->posterLomba);
            }
            $lomba->posterLomba = $request->file('posterLomba')->store('posters', 'public');
        }

        if ($request->hasFile('lampiran')) {
            if ($lomba->posterLomba) {
                Storage::disk('public')->delete($lomba->lampiran);
            }
            $lomba->lampiran = $request->file('lampiran')->store('lampirans', 'public');
        }

        $lomba->idAdmin = $idAdmin;
        $lomba->namaLomba = $request->namaLomba;
        $lomba->deskripsiLomba = $request->deskripsiLomba;
        $lomba->tanggalBukaPendaftaran = $request->tanggalBukaPendaftaran;
        $lomba->tanggalTutupPendaftaran = $request->tanggalTutupPendaftaran;
        $lomba->save();

        return redirect('admin/lomba')->with('success', "Lomba berhasil diperbarui!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lomba $lomba)
    {
        // del file
        if ($lomba->posterLomba) {
            Storage::disk('public')->delete($lomba->posterLomba);
        }
        if ($lomba->lampiran) {
            Storage::disk('public')->delete($lomba->lampiran);
        }

        Peserta::where('idLomba', $lomba->id)->delete();

        $lomba->delete();

        return redirect('admin/lomba')->with('success', 'Lomba berhasil dihapus!!');
    }

    public function announ()
    {
        // Fetch the relevant Lomba model data if needed, for example:
        $lomba = Lomba::first(); // Adjust this as necessary

        return view("app.admin.announcement-admin", ["lomba" => $lomba]);
    }

    public function task()
    {
        // Fetch the relevant Lomba model data if needed, for example:
        $lomba = Lomba::first(); // Adjust this as necessary

        return view("app.admin.task-admin", ["lomba" => $lomba]);
    }

}
