@extends('layouts.app')

@section('title', 'Submission')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 bg-white rounded-3 text-center">
                <form action="mahasiswa/submission/store" class="dropzone" id="upload-file" enctype="multipart/form-data">
                    @csrf
                    {{-- Drag and Drop Single/Multiple Files Here<br> --}}
                </form>
                <button id="submit-all" class="btn btn-primary my-3">Submit</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.uploadFile = {
            maxFiles: 1,
            // addRemoveLinks: true,
            acceptedFiles: '.jpg, .png, .jpeg, .pdf, .ppt, .pptx, .doc, .docx'
            paramName: 'lampiran',
            params: {
                _token: document.querySelector('meta[name="csrf-token"]').content
            }
        }
    </script>
@endsection
