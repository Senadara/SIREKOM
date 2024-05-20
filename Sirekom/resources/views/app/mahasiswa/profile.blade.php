@extends('layouts.app')
@section('content')
    <main class="container py-4 ">
        <div class="row mb-2 justify-content-center align-items-center text-center ">
            <h1 class="text-white fw-semibold ">
                Profile
            </h1>
        </div>
        <div class="row">
            <div class="col-12 rounded-2 p-5" style="background-color: #FAF9F6">
                <div class="row mb-5 gap-5 d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Deskripsi Lomba</label>
                            <textarea class="form-control" id="deskripsiLomba" name="deskripsiLomba" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="deadlinePendaftaran" class="form-label fw-semibold">Deadline Pendaftaran</label>
                            <input type="date" class="form-control" id="deadlinePendaftaran" name="deadlinePendaftaran">
                        </div>
                        <div class="mb-3">
                            <label for="guideBookLomba" class="form-label fw-semibold">Guidebook Lomba</label>
                            <input type="file" class="form-control" id="guideBookLomba" name="guideBookLomba">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                        <div class="text-white d-flex justify-content-center ">
                            <img src="{{ asset('assets/img/no-image.svg') }}" id="result" alt="" width="350"
                                height="350" style="border-radius: 10px;">
                        </div>
                        <input type="file" class="form-control mt-3" id="thumbnail" name="thumbnail">
                    </div>
                </div>
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-12">
                        <a href="" class="btn px-5 text-white" style="background-color: #922E2C;">
                            Tambah Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
