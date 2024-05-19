@extends('layouts.app')
@section('content')
    <div class="container py-3">
        <h4 class="text-center text-white fw-semibold">TAMBAH DATA LOMBA</h4>
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4 py-5 px-2 rounded-2" style="background: #FAF9F6">
                <form>
                    @csrf
                    <div class="row justify-content-center gap-5">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="namaLomba" class="form-label fw-medium ">Nama Lomba</label>
                                <input type="email" class="form-control" id="namaLomba" name="namaLomba"
                                    placeholder="Masukkan Nama Lomba">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiLomba" class="form-label fw-medium">Deskripsi Lomba</label>
                                <textarea class="form-control" id="deskripsiLomba" name="deskripsiLomba" rows="5"
                                    placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="deadlinePendaftaran" class="form-label fw-medium">Deadline
                                    Pendaftaran</label>
                                <input type="datetime-local" class="form-control" id="deadlinePendaftaran"
                                    name="deadlinePendaftaran">
                            </div>
                            <div class="mb-3">
                                <label for="guideBookLomba" class="form-label fw-medium">Guidebook Lomba</label>
                                <input type="file" class="form-control" id="guideBookLomba" name="guideBookLomba">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label fw-semibold d-block">Thumbnail</label>
                                <img src="{{ asset('assets/img/no-image.svg') }}" id="result" alt=""
                                    width="300" height="" style="border-radius: 10px;">
                                <input type="file" class="form-control mt-3" id="thumbnail" name="thumbnail">
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button class="btn text-white" type="submit"
                                style="background-color: #922E2C; padding: 8px 124px">Tambah
                                Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
