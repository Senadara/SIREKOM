<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Task;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('app.mahasiswa.data-lomba', [
            'lombas' => $lombas
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
        $tasks = DB::table('task')
            ->join('lombas', 'task.idLomba', '=', 'lombas.id')
            ->select(
                'task.id',
                'task.namaTask',
                'task.tipe',
                'task.deskripsiTask',
                'task.deadlineTask',
                'task.lampiran',
                'lombas.namaLomba',
                'lombas.deskripsiLomba',
                'lombas.tanggalBukaPendaftaran',
                'lombas.tanggalTutupPendaftaran',
                'lombas.posterLomba',
                'lombas.lampiran'
            )
            ->where('task.idLomba', $lomba->id)
            ->get();

        //dd($tasks);
        return view('app.mahasiswa.detailLomba', [
            'tasks' => $tasks,
            'lomba' => $lomba,
        ]);
    }


    public function register(Request $request, $idLomba)
    {

        $idMahasiswa = Session::get('idMahasiswa');

        // Create a new Peserta instance and set its properties
        $peserta = new Peserta();
        $peserta->idLomba = $idLomba;
        $peserta->idMahasiswa = $idMahasiswa;
        $peserta->tanggalDaftar = now();
        $peserta->save();

        // Get the mahasiswa instance using the authenticated ID
        $mahasiswa = Mahasiswa::find($idMahasiswa);

        // Ensure mahasiswa instance is found
        if ($mahasiswa) {
            // Assuming Mahasiswa uses the 'mahasiswa' guard
            $mahasiswaGuard = 'mahasiswa';

            // Retrieve the user instance if Mahasiswa extends or is related to User model
            $user = Mahasiswa::find($idMahasiswa);

            // Ensure user instance is found and has role management methods
            if ($user) {
                // Assign the 'mahasiswa' and 'peserta' roles using the appropriate guard
                $user->syncRoles(['mahasiswa', 'peserta']);
                // Optional: Assign permission to view tasks
                // $user->givePermissionTo('ViewTask');
            } else {
                return redirect()->back()->with('error', 'User not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Mahasiswa not found.');
        }

        // Redirect to the correct route with a success message
        return redirect()->route('mahasiswa.lomba.show', ['lomba' => $idLomba])->with('success', 'Lomba berhasil diperbarui!!');


        // // dd('Register method called'); // Debugging statement
        // try {
        //     // Mendapatkan ID mahasiswa dari session
        //     $idMahasiswa = $request->session()->get('idMahasiswa');

        //     // Mendapatkan objek mahasiswa yang sedang login
        //     $mahasiswa = Mahasiswa::find($idMahasiswa);

        //     // Cek apakah mahasiswa sudah memiliki peran 'peserta'
        //     if ($mahasiswa->peserta()->where('idLomba', $idLomba)->exists()) {
        //         return redirect()->back()->withErrors(['error' => 'Anda sudah terdaftar sebagai peserta dalam lomba ini.']);
        //     }

        //     // Buat entri baru di tabel Peserta
        //     $peserta = new Peserta();
        //     $peserta->idLomba = $idLomba;
        //     $peserta->idMahasiswa = $mahasiswa->id;
        //     $peserta->tanggalDaftar = now();
        //     $peserta->save();

        //     // Mengubah role mahasiswa menjadi peserta
        //     $mahasiswa->assignRole('peserta');

        //     // Redirect ke halaman detail Lomba setelah berhasil mendaftar
        //     return redirect()->route('app.mahasiswa.detailLomba', ['lomba' => $idLomba])
        //         ->with('success', 'Anda telah berhasil mendaftar');
        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
        // }

        // try {
        //     // Mengambil semua data Mahasiswa beserta relasi Peserta
        //     $mahasiswas = Mahasiswa::with('pesertas')->get();

        //     foreach ($mahasiswas as $mahasiswa) {
        //         // Cek apakah mahasiswa sudah terdaftar untuk Lomba tertentu
        //         if (!$mahasiswa->pesertas->contains('idLomba', $idLomba)) {
        //             // Buat entri baru di tabel Peserta
        //             $peserta = new Peserta();
        //             $peserta->idLomba = $idLomba;
        //             $peserta->idMahasiswa = $mahasiswa->id;
        //             $peserta->tanggalDaftar = now();
        //             $peserta->save();

        //             // Redirect ke halaman detail Lomba setelah berhasil mendaftar
        //             return redirect()->route('app.mahasiswa.detailLomba', ['lomba' => $idLomba])->with('success', 'Anda telah berhasil mendaftar');
        //         }
        //     }
        //     // Jika semua mahasiswa sudah terdaftar, kirim pesan error
        //     return redirect()->back()->withErrors(['error' => 'Semua posisi telah terdaftar.']);
        // } catch (\Exception $e) {
        //     // Handle exception if save fails
        //     return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
        // }

        // try {
        //     // Mendapatkan mahasiswa yang sedang login
        //     $mahasiswa = auth()->user();

        //     // Cek apakah mahasiswa sudah terdaftar untuk Lomba tertentu
        //     if (!$mahasiswa->pesertas->contains('idLomba', $idLomba)) {
        //         // Buat entri baru di tabel Peserta
        //         $peserta = new Peserta();
        //         $peserta->idLomba = $idLomba;
        //         $peserta->idMahasiswa = $mahasiswa->id;
        //         $peserta->tanggalDaftar = now();
        //         $peserta->save();

        //         // Mengubah role mahasiswa menjadi peserta
        //         $mahasiswa->assignRole('peserta');
        //         // $mahasiswa->save();

        //         // Redirect ke halaman detail Lomba setelah berhasil mendaftar
        //         return redirect()->route('app.mahasiswa.detailLomba', ['lomba' => $idLomba])
        //             ->with('success', 'Anda telah berhasil mendaftar');
        //     }

        //     // Jika mahasiswa sudah terdaftar, kirim pesan error
        //     return redirect()->back()->withErrors(['error' => 'Anda sudah terdaftar untuk lomba ini.']);
        // } catch (\Exception $e) {
        //     // Handle exception if save fails
        //     return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
        // }
    }

    public function PermissionTasks($idLomba)
    {
        // dd($idLomba);
        $datamhs = session('id');
        // dd($datamhs);
        $datamahasiswa = Mahasiswa::findOrFail($datamhs);
        $datamahasiswa->givePermissionTo('ViewTask');
        $datalomba = Lomba::findOrFail($idLomba);
        // Mengambil idMahasiswa dari data yang diambil
        // $idMahasiswa = $datamahasiswa->id;

        // Anda dapat mengganti ini dengan cara yang sesuai untuk mendapatkan idLomba
        $idLomba = $datalomba; // Misalnya, Anda dapat mengambilnya dari input form atau sesuai dengan logika aplikasi Anda

        // Menambahkan entri ke tabel peserta
        Peserta::create([
            'idLomba' => $idLomba,
            'idMahasiswa' => $datamahasiswa
        ]);

        return redirect()->route('mahasiswa.lomba')->with('success', 'Give permission as admin division to ' . $datamahasiswa->name);
    }
}

