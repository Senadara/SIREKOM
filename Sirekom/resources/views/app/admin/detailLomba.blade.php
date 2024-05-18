@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">DETAIL LOMBA</h4>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card mt-3 mb-5">
                    <div class="p-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card cardLomba">
                                    <img src={{ asset('assets/img/Gemastik.png') }} class="card-img-top" alt="Gemastik">
                                    <div class="card-body lombaBody">
                                        <p class="card-text lombaText">
                                            <b>PAGELARAN MAHASISWA NASIONAL BIDANG TEKNOLOGI INFORMASI DAN KOMUNIKASI</b>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted lombaText">
                                                Gemastik adalah Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.
                                            </small>
                                        </p>
                                        <p class="card-text">
                                            <img src="{{ asset('assets/img/picture_as_pdf.svg') }}">
                                            <small class="text-muted lombaText">
                                                Guidebook - Panduan Gemastik 2024
                                            </small>
                                        </p>
                                        <p class="card-text lombaText">
                                            <b>Deadline pendaftaran</b> : <small class="text-muted lombaText"> 18 Mei 2024
                                                14:09
                                                WIB</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex h-auto justify-content-center align-items-center">
                                <div class="card p-2">
                                    <p class="card-text text-center">
                                        <img src="{{ asset('assets/img/duo.svg') }}" alt="Duo Image"
                                            style="max-width: 100%; height: auto;">
                                        <small>Meeting 1 - Introduction Gemastik 2024</small>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
