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
                                    class="text-white fw-semibold">Prodi</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Angkatan</span>
                            </th>
                            <th style="background-color: #922E2C" scope="col"><span class="text-white fw-semibold">No
                                    Whatsapp</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Nanda</td>
                            <td>1201220007</td>
                            <td>Rekayasa Perangkat Lunak</td>
                            <td>2022</td>
                            <td>083848931368</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    <button class="rounded-2 border-0 text-light py-1 px-3" style="background-color: #922E2C">Export Data
                        Peserta</button>
                </div>
                <div class="col">
                    <button class="rounded border-0 shadow">
                        <span>&lt;&lt;&lt;</span></button>
                    <button class="rounded border-0 text-light py-1 px-2" style="background-color: #922E2C">1</button>
                    <button class="rounded border-0 text-light py-1 px-2" style="background-color: #922E2C">2</button>
                    <button class="rounded border-0 text-light py-1 px-2" style="background-color: #922E2C">3</button>
                    <button class="rounded border-0 shadow">&gt;&gt;&gt;</button>
                </div>
            </div>
        </div>
    </div>
@endsection
