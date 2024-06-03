@extends('layouts.app')
@section('content')
    <div>
        <div class="container text-center py-4 text-light">
            <h1>DAFTAR PESERTA LOMBA</h1>
        </div>
        <div class="container text-center bg-white p-4 rounded-2">
            <div class="row container">
                <table class="table table-bordered table-responsive border-black ">
                    <thead>
                        <tr>
                            <th style="background-color: #922E2C" scope="col"><span class="text-white fw-semibold">No</span>
                            </th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Nama</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">NIM</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Jurusan</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Angkatan</span>
                            </th>
                            <th style="background-color: #922E2C" scope="col"><span class="text-white fw-semibold">
                                    Nama Lomba</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertas as $peserta)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $peserta->namaMahasiswa }}</td>
                                <td>{{ $peserta->nim }}</td>
                                <td>{{ $peserta->jurusan }}</td>
                                <td>{{ $peserta->angkatan }}</td>
                                <td>{{ $peserta->namaLomba }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    <a href="/peserta/export_excel/{{ $idLomba }}" class="rounded-2 border-0 text-light py-1 px-3"
                        style="background-color: #922E2C; text-decoration:none;">Export Data Peserta</a>
                </div>
                <div class="col">
                    {{-- <button class="rounded border-0 shadow">
                        <span>&lt;&lt;&lt;</span></button>
                    <button class="rounded border-0 text-light py-1 px-2" style="background-color: #922E2C">1</button>
                    <button class="rounded border-0 text-light py-1 px-2" style="background-color: #922E2C">2</button>
                    <button class="rounded border-0 text-light py-1 px-2" style="background-color: #922E2C">3</button>
                    <button class="rounded border-0 shadow">&gt;&gt;&gt;</button> --}}
                    {!! $pesertas->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
