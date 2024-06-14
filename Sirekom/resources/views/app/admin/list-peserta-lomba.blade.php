@extends('layouts.app')
@section('content')
    <div>
        <div class="container text-center py-4 text-light">
            <h1>DAFTAR PESERTA LOMBA</h1>
        </div>
        <div class="container text-center bg-white p-4 rounded-2">
            <div class="row mb-4">
                <div class="col text-start">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #922E2C">
                            Pilih Lomba
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" data-id="">Semua Lomba</a></li>
                            @foreach ($lombas as $lomba)
                                <li><a class="dropdown-item" href="#"
                                        data-id="{{ $lomba->id }}">{{ $lomba->namaLomba }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row container">
                <table class="table table-bordered table-responsive border-black">
                    <thead>
                        <tr>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">No</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Nama</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">NIM</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Jurusan</span></th>
                            <th style="background-color: #922E2C" scope="col"><span
                                    class="text-white fw-semibold">Angkatan</span></th>
                            <th style="background-color: #922E2C" scope="col"><span class="text-white fw-semibold">Nama
                                    Lomba</span></th>
                        </tr>
                    </thead>
                    <tbody id="peserta-table-body">
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
                {{-- belum saya fix paginationnya --}}
                {{-- {!! $pesertas->links('pagination::bootstrap-5') !!} --}}
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <a id="export-link" href="/peserta/export_excel/{{ $idLomba }}"
                        class="rounded-2 border-0 text-light py-1 px-3"
                        style="background-color: #922E2C; text-decoration:none;">Export Data Peserta</a>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.dropdown-item').click(function(event) {
                event.preventDefault();
                var idLomba = $(this).data('id');

                $('#export-link').attr('href', '/peserta/export_excel/' + idLomba);

                // Ambil token dari session atau meta tag (sesuaikan dengan aplikasi Anda)
                var token = "{{ session('bearer_token') }}";

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/peserta/' + (idLomba ? idLomba : ''),
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        var tableBody = $('#peserta-table-body');
                        tableBody.empty();
                        $.each(response.pesertas, function(index, peserta) {
                            var row = '<tr>' +
                                '<th scope="row">' + (index + 1) + '</th>' +
                                '<td>' + peserta.namaMahasiswa + '</td>' +
                                '<td>' + peserta.nim + '</td>' +
                                '<td>' + peserta.jurusan + '</td>' +
                                '<td>' + peserta.angkatan + '</td>' +
                                '<td>' + peserta.namaLomba + '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    },
                    error: function(response) {
                        console.error('Error:', response);
                    }
                });
            });
        });
    </script>
@endsection
