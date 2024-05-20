@extends('layouts.app')

@section('title')
    Add Data Lomba
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="mb-3 text-center" style="color: white;">DAFTAR LOMBA</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 5vh;">
                                <form method="POST" action="{{ route('lomba.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Name Lomba</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc">Deskripsi Lomba</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="4" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="DL">Deadline Pendaftaran</label>
                                        <input type="text" class="form-control" id="DL" name="DL" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="file">Guidebook Lomba</label>
                                        <input type="file" class="form-control-file" id="file" name="file" required>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center" style="padding-left: 15vh;">
                                <label for="thumbnail" class="mb-3" style="margin-top: -100px;">Ini Thumbnail</label>
                                <img id="thumbnail" src="{{ asset('assets/img/Gemastik.png') }}" class="img-thumbnail" alt="iki sakjane foto" style="width: 100px; height: auto;">
                                <br>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" form="lombaForm" class="btn btn-danger">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
