@extends('layouts.app');
@section('content')
    <div>
        <div class="container text-center py-4 text-light">
            <h1>DAFTAR PESERTA LOMBA</h1>
        </div>
        <div class=" container text-center container-table container-xl bg-white p-4 rounded-4">
            <div class="row">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">No Whatsapp</th>
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
                    <button class="rounded-2 border-0 bg-danger text-light py-1 px-3">Export Data Peserta</button>
                </div>
                <div class="col">
                  <button class="rounded border-0 shadow "><<</button>
                  <button class="rounded border-0 bg-danger text-light py-1 px-2 ">1</button>
                  <button class="rounded border-0 bg-danger text-light py-1 px-2 ">2</button>
                  <button class="rounded border-0 bg-danger text-light py-1 px-2 ">3</button>
                  <button class="rounded border-0 shadow ">>></button>
                </div>
            </div>
        </div>
    </div>
@endsection