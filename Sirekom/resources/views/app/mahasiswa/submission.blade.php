@extends('layouts.app')
@section('title', 'Submission')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 rounded-3 text-center " style="background-color: #FAF9F6">
                <div id="dropzone">
                    <form action="{{ route('FileUpload') }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            Drag and Drop Single/Multiple Files Here<br>
                        </div>
                    </form>
                </div>
                <button id="submit-all" class="btn btn-primary mt-3">Submit</button>
                <div id="file-list" class="mt-3">
                    {{-- @foreach ($files as $file) --}}
                    {{-- <div class="file-item" data-id="{{ $file->id }}"> --}}
                    {{-- <img src="{{ asset('images/' . $file->file_name) }}" alt="{{ $file->file_name }}" width="150"> --}}
                    {{-- <button class="btn btn-danger btn-sm delete-file" data-id="{{ $file->id }}">x</button> --}}
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js-libraries')
    <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            addRemoveLinks: true,
            removedfile: function(file) {
                var id = file.previewElement.dataset.id;
                if (id) {
                    $.ajax({
                        url: '/mahasiswa/submission/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(result) {
                            file.previewElement.remove();
                        }
                    });
                } else {
                    file.previewElement.remove();
                }
            },
            success: function(file, response) {
                file.previewElement.dataset.id = response.id;
            }
        });

        $('#submit-all').click(function() {
            $.ajax({
                url: '{{ route('FileUpload') }}',
                type: 'POST',
                data: dropzone.files,
                processData: false,
                contentType: false,
                success: function(response) {
                    window.location.href = '/mahasiswa';
                }
            });
        });

        $(document).on('click', '.delete-file', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/mahasiswa/submission/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('div[data-id="' + id + '"]').remove();
                }
            });
        });
        Dropzone.autoDiscover = false;
        var dropzone = new Dropzone('#file-upload', {
            url: '{{ route('FileUpload') }}',
            maxFilesize: 5,
            parallelUploads: 3,
            addRemoveLinks: true,
            success: function(file, response) {
                $(file.previewElement).attr('data-id', response.success);
                $('<button class="btn btn-danger btn-sm delete-file">x</button>').appendTo(file.previewElement)
                    .click(function() {
                        var id = $(file.previewElement).attr('data-id');
                        $.ajax({
                            url: '/mahasiswa/submission/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                dropzone.removeFile(file);
                            }
                        });
                    });
            }
        });

        $('#submit-all').click(function() {
            $.ajax({
                url: '{{ route('storeSubmission') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    window.location.href = '/mahasiswa';
                }
            });
        });

        $('.delete-file').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/mahasiswa/submission/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('div[data-id="' + id + '"]').remove();
                }
            });
        });
    </script>
@endpush
