<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DashboardChart;
use App\Http\Controllers\Controller;
use Laravel\LarapexCharts\Classes\Chart;
use App\Models\Lomba;
use App\Models\Peserta;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {

        $TotalPeserta = Peserta::count();
        $TotalLomba = Lomba::count();
        $InfoLomba = Lomba::select('namaLomba', 'tanggalTutupPendaftaran')->take(3)->get();

        $larapexChart = new LarapexChart();

        $dashboardChart = new DashboardChart($larapexChart);

        $chart = $dashboardChart->build();

        return view('app.admin.dashboard', compact('chart', 'TotalPeserta', 'TotalLomba', 'InfoLomba'));
    }
}
