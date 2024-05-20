@extends('layouts.app')
@section('content')
<div>
        <div class="container text-center py-4 text-light">
            <h1>DAFTAR LOMBA</h1>
        </div>
        <div class=" container text-center container-table container-xl bg-white p-4 rounded-4">
            <div class="row">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lomba</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Guidebook</th>
                            <th scope="col">Thumbnail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lomba 1</td>
                            <td>.......</td>
                            <td> 13 Juni 2024</td>
                            <td>
                                <a href="{{ asset('../doc/file1.pdf') }}" download>
                                    <h6>Download Guidebook</h6>
                                </a>
                            </td>
                            <td>
                                <a href="your_link_url_here">
                                <img src="{{ asset('../img/image2.jpg') }}" width="300" height="200">
                                </a>
                            </td>
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