@extends('layouts.app')
@section('content')
<div>
        <div class="container text-center py-4 text-light">
            <h1>List Pengumpulan</h1>
        </div>
        <div class=" container text-center container-table container-xl bg-white p-4 rounded-4">
            <br>    
            <div class="row">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lomba</th>
                            <th scope="col">Submit</th>
                            <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Dinda Maya</td>
                            <td> 13 Juni 2024</td>
                            <td>
                                <a href="{{ asset('../doc/file1.pdf') }}" download>
                                    <h6>Download File</h6>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jasmine Reynatha</td>
                            <td> 13 Juni 2024</td>
                            <td>
                                <a href="{{ asset('../doc/file1.pdf') }}" download>
                                    <h6>Download File</h6>
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
                    <button class="rounded-2 border-0 bg-danger text-light py-1 px-3">Export File Peserta</button>
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