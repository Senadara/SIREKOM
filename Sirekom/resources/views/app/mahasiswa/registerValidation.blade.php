@extends('layouts.background')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center align-items-center text-center">
            <h1 class="text-white fw-bold">Pastikan Data Anda terdaftar</h1>
            <div class="col-12 d-flex p-5 justify-content-center align-items-center">
                <div class="bg-white rounded-4 p-4">
                    <textarea id="mahasiswaText" cols="30" rows="10" style="resize:none" disabled>{{ $mahasiswaText }}</textarea>

                    <form action="{{ route('register.save') }}" method="POST">
                        @csrf
                        @foreach ($validatedData as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        @if ($buttonDisabled === false)
                            <button class="btn btn-primary mt-3">Submit</button>
                        @else
                            <button class="btn btn-primary mt-3" disabled>Submit</button>
                            <a href="/register" class="btn btn-danger mt-3">Back</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
