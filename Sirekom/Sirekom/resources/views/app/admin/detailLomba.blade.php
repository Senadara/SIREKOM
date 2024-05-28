@extends('layouts.app')
@section('content')
    <div class="container pb-5 pt-2">
        <h4 class="text-center mb-4 text-white fw-semibold " style="font-size: 36px">DETAIL LOMBA</h4>
        <div class="row justify-content-center">
            <div class="col-md-12 rounded-2" style="background-color: #FAF9F6">
                <div class="row">
                    <div class="col-md-5" style="padding: 40px 80px">
                        <div class="card shadow-lg rounded-3 ">
                            <img src={{ asset('assets/img/Gemastik.png') }} class="card-img-top" alt="Logo Lomba">
                            <div class="card-body text-white" style="background-color: #960D12">
                                <h6 class="card-title fw-semibold">
                                    PAGELARAN MAHASISWA NASIONAL BIDANG TEKNOLOGI INFORMASI DAN KOMUNIKASI
                                </h6>
                                <p class="card-text fw-normal">
                                    Gemastik adalah Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="mb-4">
                                    <a href="" class="card-text text-decoration-none text-white mb-">
                                        <img src="{{ asset('assets/img/picture_as_pdf.svg') }}">
                                        Guidebook - Panduan Gemastik 2024
                                    </a>
                                </div>
                                <p class="card-text">
                                    <span class="fw-bold">Deadline pendaftaran :</span> 18 Mei 2024 14:09 WIB
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 d-flex flex-column justify-content-start column-left align-items-start p-5"
                        style="background-color: #ECECEE">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="p-4 rounded-3 shadow mb-4" style="background-color: #FAF9F6; width: 450px">
                                    <a href=""
                                        class="d-flex text-center align-items-center text-decoration-none text-black">
                                        <img src="{{ asset('assets/img/duo.svg') }}" alt="Meet" class="me-2"
                                            style="width: 36px; height: 36px;">
                                        <span class="fs-5">
                                            Meeting 1 - Introduction Gemastik 2024
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="p-4 rounded-3 shadow mb-4" style="background-color: #FAF9F6; width: 450px">
                                    <a href=""
                                        class="d-flex text-center align-items-center text-decoration-none text-black">
                                        <img src="{{ asset('assets/img/description.svg') }}" alt="Duo Image" class="me-2"
                                            style="width: 36px; height: 36px;">
                                        <span class="fs-5">
                                            Task 1 - Pengumpulan Proposal (Bab 1)
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
