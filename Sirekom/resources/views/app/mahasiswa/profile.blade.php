@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="mt-3 mx-4">
                            <div class="text-center">
                                <img src="{{ asset('storage/img/profile/' . $mahasiswa->fotoProfile) }}"
                                alt="profile" class="rounded-circle" width="100" height="100">
                            </div>
                            <div class="text-center">
                                <th>{{ $mahasiswa->namaMahasiswa }}</th>
                            </div>
                            <div class="text-center">
                                <th>{{ $mahasiswa->nim }}</th>
                            </div>
                            <div class="text-center">
                                <th>{{ $mahasiswa->jurusan }}</th>
                            </div>
                            <div class="text-center">
                                <th>{{ $mahasiswa->angkatan }}</th>
                            </div>
                            <div class="text-center">
                                <th>{{ $mahasiswa->noHP }}</th>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mahasiswa.profile.update',$mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="namaMahasiswa" id="name" class="form-control"
                                        value="{{ $mahasiswa->namaMahasiswa }}">
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input disabled type="text" name="nim" id="nim" class="form-control"
                                        value="{{ $mahasiswa->nim }}">
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <input disabled type="text" name="prodi" id="prodi" class="form-control" value="{{ $mahasiswa->jurusan }}">
                                </div>
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input disabled type="text" name="angkatan" id="angkatan" class="form-control"
                                        value="{{ $mahasiswa->angkatan }}">
                                </div>
                                <div class="form-group">
                                    <label for="noWa">no Whatsapp</label>
                                    <input type="text" name="noWa" id="noWa" class="form-control"
                                        value="{{ $mahasiswa->noHP }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password (optional)</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fotoProfile">Foto Profile</label>
                                    <input type="file" name="fotoProfile" class="form-control">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-danger">Update Profile</button>
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
