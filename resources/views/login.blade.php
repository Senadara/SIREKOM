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
                <div>
                    <div class="card p-4" style="width: 24rem;">
                        <h1 class="text-center mb-4 text-danger">Sign In</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="/" method="POST">
                            @csrf
                            @if (@session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endsession
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username') }}"
                                        placeholder="Masukkan Username">
                                    @if ($errors->has('username'))
                                        <div class="error">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="{{ old('password') }}"
                                        placeholder="Masukkan Password">
                                    @if ($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-danger w-100">Login</button>
                        </form>
                    </div>
                    <div class="text-center mt-3">
                        <p>Belum Punya Akun? <a href="/register" style="text-decoration: none; color: maroon">Sign Up.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
