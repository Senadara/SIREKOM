<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi</title>
    <script>
        function handleTypeChange() {
            var typeSelect = document.getElementById('typeSelect');
            var deadlineField = document.getElementById('deadlineField');
            if (typeSelect.value === '2') {
                deadlineField.style.display = 'block';
            } else {
                deadlineField.style.display = 'none';
            }
        }
    </script>
</head>
<body>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">TAMBAH DATA</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <input value="{{$lomba}}" type="number"
                                            id="idLomba" name="idLomba" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaTask" class="form-label fw-bold">   Task</label>
                                        <input type="text" class="form-control @error('namaTask') is-invalid @enderror"
                                            id="namaTask" name="namaTask">
                                        @error('namaTask')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsiTask" class="form-label fw-bold">DeskripsiTask Task</label>
                                        <textarea class="form-control @error('deskripsiTask') is-invalid @enderror" id="deskripsiTask" name="deskripsiTask"
                                            rows="5"></textarea>
                                        @error('deskripsiTask')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="typeSelect" class="form-label fw-bold">Select Type</label>
                                        <select class="form-control" id="typeSelect" name="tipe" onchange="handleTypeChange()">
                                            <option value="1">Announcement</option>
                                            <option value="2">Task</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lampiran" class="form-label fw-bold">Input File</label>
                                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                            id="lampiran" name="lampiran">
                                        @error('lampiran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3" id="deadlineField" style="display: none;">
                                        <label for="deadlineTask" class="form-label fw-bold">Tanggal Deadline</label>
                                        <input type="date" class="form-control" id="deadlineTask" name="deadlineTask">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #922E2C; border-radius: 10px; width: 362px; height: 48px; color: white;">
                                    Submit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
