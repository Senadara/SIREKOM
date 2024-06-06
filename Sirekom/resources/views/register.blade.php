@extends('layouts.background')

@section('content')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 text-white d-flex align-items-center justify-content-center"
                style="height: 100vh; width: 70%;">
                <div class="mx-5">
                    <img src="{{ asset('assets/img/Logo_Telkom_potrait.png') }}" alt="Logo" class="mb-4 w-50">
                    <h3>Selamat Datang di</h3>
                    <h1>SIREKOM</h1>
                    <p>Sistem Registrasi Kompetisi Mahasiswa<br>Telkom University</p>
                </div>
            </div>
            <div class="col-md-6 d-flex bg-white align-items-center justify-content-center"
                style="height: 100vh; width: 30%;">
                <div class="card p-4" style="width: 24rem;">
                    <h1 class="text-center mb-4 text-danger">Sign up</h1>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}"
                                placeholder="Masukkan Username">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="{{ old('password') }}"
                                placeholder="Masukkan Password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('namaMahasiswa') is-invalid @enderror"
                                id="namaMahasiswa" name="namaMahasiswa" value="{{ old('namaMahasiswa') }}"
                                placeholder="Masukkan nama">
                            @error('namaMahasiswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Masukkan email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM">
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Prodi</label>
                            <select class="form-select @error('jurusan') is-invalid @enderror"
                                aria-label="Default select example" name="jurusan">
                                <option selected disabled>Pilih Prodi</option>
                                <option name="jurusan" value="Rekayasa Perangkat Lunak {{ old('jurusan') }}">Rekayasa
                                    Perangkat Lunak
                                </option>
                                <option name="jurusan" value="Informatika {{ old('jurusan') }}">Informatika</option>
                                <option name="jurusan" value="Sains Data {{ old('jurusan') }}">Sains Data</option>
                                <option name="jurusan" value="Teknologi Informasi {{ old('jurusan') }}">Teknologi Informasi
                                </option>
                                <option name="jurusan" value="Sistem Informasi {{ old('jurusan') }}">Sistem Informasi
                                </option>
                                <option name="jurusan" value="Teknik Telekomunikasi {{ old('jurusan') }}">Teknik
                                    Telekomunikasi</option>
                                <option name="jurusan" value="Teknik Logistik {{ old('jurusan') }}">Teknik Logistik
                                </option>
                                <option name="jurusan" value="Teknik Industri {{ old('jurusan') }}">Teknik Industri
                                </option>
                                <option name="jurusan" value="Teknik Elektro {{ old('jurusan') }}">Teknik Elektro</option>
                                <option name="jurusan" value="Teknik Komputer {{ old('jurusan') }}">Teknik Komputer
                                </option>
                                <option name="jurusan" value="Bisnis Digital {{ old('jurusan') }}">Bisnis Digital</option>
                            </select>
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noHP" class="form-label">No Whatsapp</label>
                            <input type="tel" class="form-control @error('noHP') is-invalid @enderror" id="noHP"
                                name="noHP" value="{{ old('noHP') }}" pattern="[0-9]{3}[0-9]{3,4}[0-9]{4}"
                                maxlength="12" placeholder="Masukkan No Whatsapp">
                            @error('noHP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Sign Up</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Punya akun? <a href="/" style="text-decoration: none; color: maroon">Sign in.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
