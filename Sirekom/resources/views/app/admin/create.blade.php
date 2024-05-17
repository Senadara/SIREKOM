@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">TAMBAH DATA LOMBA</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="namaLomba" class="form-label fw-bold">Nama Lomba</label>
                                        <input type="text" class="form-control" id="namaLomba" name="namaLomba">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsiLomba" class="form-label fw-bold">Deskripsi Lomba</label>
                                        <textarea class="form-control" id="deskripsiLomba" name="deskripsiLomba" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deadlinePendaftaran" class="form-label fw-bold">Deadline Pendaftaran</label>
                                        <input type="date" class="form-control" id="deadlinePendaftaran" name="deadlinePendaftaran">
                                    </div>
                                    <div class="mb-3">
                                        <label for="guideBookLomba" class="form-label fw-bold">Guidebook Lomba</label>
                                        <input type="file" class="form-control" id="guideBookLomba" name="guideBookLomba">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label fw-bold">Thumbnail</label>
                                        <div class="text-white">
                                            <img src="{{ asset('assets/img/no-image.svg') }}" id="result" alt="" width="200" height="200" style="border-radius: 10px;">
                                            <input type="file" class="form-control mt-3" id="thumbnail" name="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tombol">
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
