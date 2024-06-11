<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>

<body>

    <main>
        <div class="bg-black" style="width: 100vw; min-height: 100vh; height: auto;">

            <div class="position-absolute"
                style="z-index: 999; width: 100vw; min-height: 100vh; height: auto; backdrop-filter: blur(30px); background: rgba(255, 255, 255, 0.02); ">
            </div>

            <div class="main">
                @include('components.navbar')
                @yield('content')
            </div>

            <div class="rounded-circle position-absolute oval-1" style="background-color: white; top: 20%; left: 40%">
            </div>
            <div class="rounded-circle position-absolute oval-2" style="background-color: #D90000; top: 0%; left: 0%">
            </div>
            <div class="rounded-circle position-absolute oval-3" style="background-color: white; bottom: 0%; right:0%">
            </div>
            <div class="rounded-circle position-absolute oval-4" style="background-color: #D90000; bottom:0%; left:50%">
            </div>
            <div class="rounded-circle position-absolute oval-5" style="background-color: white; bottom:10%; left:20%">
            </div>
            <div class="rounded-circle position-absolute oval-6" style="background-color: #D90000; top:0%; right:10%">
            </div>

        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>