@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">TAMBAH DATA LOMBA</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        <form action="/lomba" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="namaLomba" class="form-label fw-bold">Nama Lomba</label>
                                        <input type="text" class="form-control @error('namaLomba') is-invalid @enderror"
                                            id="namaLomba" name="namaLomba" value="{{ old('namaLomba') }}">
                                        @error('namaLomba')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsiLomba" class="form-label fw-bold">Deskripsi Lomba</label>
                                        <textarea class="form-control @error('deskripsiLomba') is-invalid @enderror" id="deskripsiLomba" name="deskripsiLomba"
                                            rows="5">{{ old('deskripsiLomba') }}</textarea>
                                        @error('deskrpsiLomba')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalPendaftaran" class="form-label fw-bold">Tanggal
                                            Pendaftaran</label>
                                        <input type="date"
                                            class="form-control @error('tanggalPendaftaran') is-invalid @enderror"
                                            id="tanggalPendaftaran" name="tanggalPendaftaran"
                                            value="{{ old('tanggalPendaftaran') }}">
                                        @error('tanggalPendaftaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="lampiran" class="form-label fw-bold">Lampiran</label>
                                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                            id="lampiran" name="lampiran">
                                        @error('lampiran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="posterLomba" class="form-label fw-bold">Poster Lomba</label>
                                        <div class="text-white">
                                            <img src="{{ asset('assets/img/no-image.svg') }}" id="result" alt=""
                                                width="200" height="200" style="border-radius: 10px;">
                                            <input type="file"
                                                class="form-control mt-3 @error('posterLomba') is-invalid @enderror"
                                                id="posterLomba" name="posterLomba">
                                            @error('posterLomba')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #922E2C; border-radius: 10px; width: 362px; height: 48px; color: white;">Tambah
                                    Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
