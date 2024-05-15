@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center d-flex flex-column justify-content-center"
                    style="margin-top:25px; margin-bottom:25px;">
                    <h1 style="color: white">DETAIL LOMBA</h1>
                </div>
            </div>
            <div class="card">
                <div class="card-body custom-body">
                    <div class="cardLomba">
                        <img src={{ asset('assets/img/Gemastik.png') }} class="card-img-top" alt="Gemastik">
                        <div class="card-body"
                            style="background-color: #960D12; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                            <p class="card-text" style="color:white; font-weight:600; line-height:19.36px">
                                PAGELARAN MAHASISWA NASIONAL BIDANG TEKNOLOGI INFORMASI DAN KOMUNIKASI
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Gemastik adalah Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                </small>
                            </p>
                            <p class="card-text">
                                <img src="{{ asset('assets/img/picture_as_pdf.svg') }}">
                                <small class="text-muted">
                                    Guidebook - Panduan Gemastik 2024
                                </small>
                            </p>
                            <p class="card-text">
                                <b>Deadline pendaftaran</b> : <small class="text-muted"> 18 Mei 2024 14:09 WIB</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
