@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-white text-center py-3">DATA LOMBA</h1>
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-4 d-flex justify-content-center align-items-center mb-3">
                <a href="/lomba/create"
                    style="background-color: #922E2C; border-radius: 10px; width: 362px; height: 48px; display: flex; justify-content: center; align-items: center; color: white; text-decoration: none;">
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="row">
            @foreach ($lombas as $lomba)
                <div class="col-md-4 col-12 mb-4 d-flex justify-content-center">
                    <div class="card rounded-4 border-0" style="width: 18rem;">
                        <img src="{{ $lomba->posterLomba }}" class="card-img-top" alt="...">
                        <div class="card-body text-white" style="background-color: #922E2C; border-radius: 0 0 15px 15px">
                            <h5 class="card-title fw-semibold">{{ $lomba->namaLomba }}</h5>
                            <p class="card-text fw-normal" style="font-size: 16px">{{ $lomba->deskripsiLomba }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
