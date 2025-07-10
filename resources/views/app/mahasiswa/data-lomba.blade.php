@extends('layouts.app')
@section('content')
<style>
    .truncated-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Jumlah baris yang ingin ditampilkan */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>


<div class="container">
    <h1 class="text-white text-center py-3">DATA LOMBA</h1>
    <div class="row mb-3 d-flex justify-content-center ">
        <div class="col-3">
            <select class="form-select mx-auto" aria-label="Default select example">
                <option selected disabled>Filter</option>
                <option value="1">Lomba yang sedang diikuti</option>
                <option value="2">Lomba yang belum diikuti</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($lombas as $lomba)
        <div class="col-md-4 col-12 mb-4 d-flex justify-content-center">
            <div class="card rounded-4 border-0" style="width: 18rem;">
                <img src="{{ Storage::url($lomba->posterLomba) }}" class="card-img-top" alt="...">
                <div class="card-body text-white" style="background-color: #922E2C; border-radius: 0 0 15px 15px">
                    <h5 class="card-title fw-semibold">{{ $lomba->namaLomba }}</h5>
                    <p class="card-text fw-normal truncated-text" style="font-size: 16px">
                        {{ $lomba->deskripsiLomba }}
                    </p>
                    <p class="card-text" style="color: #FFBF1A; font-size: 12px">{{ $lomba->tanggalPendaftaran }}
                    </p>
                    <div class="col-12 text-center rounded-3" style="background-color: #FFBF1A">
                        <a onclick="window.location.href='{{ route('mahasiswa.lomba.show', $lomba->id) }}'"
                            class="btn text-decoration-none text-white">Bergabung Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection