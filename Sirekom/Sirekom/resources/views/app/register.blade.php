@extends('layouts.background')

@section('content')
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-md-6 text-white d-flex align-items-center justify-content-center" style="height: 100vh; width: 70%;">
            <div class="mx-5">
                <img src="{{ asset('assets/img/Logo_Telkom_potrait.png') }}" alt="Logo" class="mb-4 w-50">
                <h3>Selamat Datang di</h3>
                <h1>SIREKOM</h1>
                <p>Sistem Registrasi Kompetisi Mahasiswa<br>Telkom University</p>
            </div>
        </div>
        <div class="col-md-6 d-flex bg-white align-items-center justify-content-center" style="height: 100vh; width: 30%;">
            <div class="card p-4" style="width: 24rem;">
                <h1 class="text-center mb-4 text-danger">Sign up</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Prodi" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_whatsapp" class="form-label">No Whatsapp</label>
                        <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp" placeholder="Masukkan No Whatsapp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div> 
                    <button type="submit" class="btn btn-danger w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
