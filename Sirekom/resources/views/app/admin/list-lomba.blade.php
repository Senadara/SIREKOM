@extends('layouts.app')
@section('content')
    <style>
        .bgc {
            background-color: #922E2C;
            border-radius: 10px;
            width: 362px;
            height: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
        }

        .img-card {
            max-width: 100%;
            overflow: hidden;
        }

        .action {
            display: flex;
            justify-content: space-evenly;
            visibility: hidden;
            padding: 10px;
        }

        .action-btn {
            display: flex;
            border: none;
            border-radius: 10px;
            padding: 10px;
            align-items: center;
            justify-items: center;
        }

        .blue {
            background-color: #007bff;
        }

        .green {
            background-color: #28a745;
        }

        .red {
            background-color: red;
        }

        .action-image {
            width: 20px;
        }

        .card:hover {
            cursor: pointer;
            scale: 105%;
            transition: 0.5s;
        }

        .card:hover .action {
            visibility: visible;
        }

        .truncate-text {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }
    </style>

    <div class="container">
        <h1 class="text-white text-center py-3">DATA LOMBA</h1>
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-4 d-flex justify-content-center align-items-center mb-3">
                <a href="/admin/lomba/create" class="bgc">
                    Tambah Data
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success my-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($lombas as $lomba)
                <div class="col-md-4 col-9 mb-4 d-flex justify-content-center">
                    <div class="card rounded-4 border-0" style="width: 20rem;">
                        <div class="action">
                            <button class="action-btn blue"
                                onclick="window.location.href='{{ route('lomba.show', $lomba->id) }}'">
                                <img src="{{ asset('assets/img/list-lomba/eye.png') }}" alt="View" class="action-image">
                            </button>

                            <button class="action-btn green"
                                onclick="window.location.href='{{ route('lomba.edit', $lomba->id) }}'">
                                <img src="{{ asset('assets/img/list-lomba/editing.png') }}" alt="Edit"
                                    class="action-image">
                            </button>

                            <form action="{{ route('lomba.destroy', $lomba->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn red"
                                    onclick="return confirm('apakah benar ingin menghapus ini?')">
                                    <img src="{{ asset('assets/img/list-lomba/bin.png') }}" alt="Delete"
                                        class="action-image">
                                </button>
                            </form>
                        </div>
                        <img class="img-card" src="{{ Storage::url($lomba->posterLomba) }}" class="card-img-top"
                            alt="{{ $lomba->namaLomba }}">
                        <div class="card-body text-white" style="background-color: #922E2C; border-radius: 0 0 15px 15px">
                            <h5 class="card-title fw-semibold">{{ $lomba->namaLomba }}</h5>
                            <p class="card-text fw-normal truncate-text" style="font-size: 16px">
                                {{ $lomba->deskripsiLomba }}</p>
                            <a href="{{ Storage::url($lomba->lampiran) }}">Guidebook</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
