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
                            {{-- {!! $chart->container() !!} --}}
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
                                        <h5 class="dashboard-card-inner-title">00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <div class="card-body-total">
                                        <h4 class="dashboard-card-inner-heading">TOTAL LOMBA</h4>
                                        <h5 class="dashboard-card-inner-title">00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center mb-3 dashboard-card">
                    <div class="card-body">
                        <p class="dashboard-date">Wednesday, 15 May 2024</p>
                        <h1 class="dashboard-time">08:30</h1>
                    </div>
                </div>

                <div>
                    <div class="card-body-timeline">
                        <h4 class="dashboard-timeline-heading">TIMELINE</h4>
                        <ul class="timeline">
                            <li class="timeline-item">Event 1 - 10:00 AM</li>
                            <li class="timeline-item">Event 2 - 11:00 AM</li>
                            <li class="timeline-item">Event 3 - 12:00 PM</li>
                            <li class="timeline-item">Event 4 - 01:00 PM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- {{ $chart->script() }} --}}

@endsection
