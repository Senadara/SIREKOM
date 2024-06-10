@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="container dashboard-container">
        <h1 class="text-center dashboard-title">Dashboard</h1>

        <div class="row">
            <div class="col-md-8">
                <div class="card text-center mb-3 dashboard-card-jupen">
                    <div class="card-body-jupen">
                        <h4 class="dashboard-card-heading-jupen">JUMLAH PENDAFTAR</h4>
                        <div class="row-jupen">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="card text-center mb-20 dashboard-card-juter">
                    <div class="card-body">
                        <h4 class="dashboard-card-heading-juter">JUMLAH TERKINI</h4>
                        <h5 class="card-title mb-10"></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <div class="card-body-total">
                                        <h4 class="dashboard-card-inner-heading">TOTAL PENDAFTAR</h4>
                                        <h5 class="dashboard-card-inner-title">{{ $TotalPeserta }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <div class="card-body-total">
                                        <h4 class="dashboard-card-inner-heading">TOTAL LOMBA</h4>
                                        <h5 class="dashboard-card-inner-title">{{ $TotalLomba }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center mb-3 dashboard-card">
                    <div class="card-body" id="dashboard-content">
                        <p class="dashboard-date"></p>
                        <h1 class="dashboard-time"></h1>
                    </div>
                </div>

                <div>
                    <div class="row gap-2 justify-content-center p-4 rounded-3" style="background-color: maroon">
                        <h4 class="text-center fw-semibold text-white">TIMELINE</h4>
                        @foreach ($InfoLomba as $item)
                            <div class="bg-white p-3 rounded-3"><span class="fw-semibold">Deadline Daftar Lomba
                                    <span class="fw-bold">
                                        {{ $item->namaLomba }}
                                    </span>
                                    :</span>
                                {{ $item->tanggalTutupPendaftaran }}</div>
                        @endforeach
                        {{-- <li class="timeline-item">Event 2 - 11:00 AM</li>
                            <li class="timeline-item">Event 3 - 12:00 PM</li>
                            <li class="timeline-item">Event 4 - 01:00 PM</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script>
        function updateTime() {
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                'November', 'Desember'
            ];

            var currentTime = new Date();
            var day = days[currentTime.getDay()];
            var date = currentTime.getDate();
            var month = months[currentTime.getMonth()];
            var year = currentTime.getFullYear();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            date = (date < 10 ? "0" : "") + date;
            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            var timeString =
                `<p class="dashboard-date">${day}, ${date} ${month} ${year}</p><h1 class="dashboard-time">${hours}:${minutes}:${seconds}</h1>`;

            document.getElementById('dashboard-content').innerHTML = timeString;
        }

        setInterval(updateTime, 1000);
    </script>


@endsection
