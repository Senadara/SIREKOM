<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DashboardChart;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Laravel\LarapexCharts\Classes\Chart;

class DashboardController extends Controller
{
    // public function getChartData()
    // {
    //     // Example: Fetching data from the database
    //     $pesertas = Lomba::select('lombas.namaLomba', DB::raw('count(pesertas.id) as total'))
    //         ->join('pesertas', 'lombas.id', '=', 'pesertas.idLomba') // Joining tables
    //         ->groupBy('lombas.namaLomba') // Grouping by namaLomba
    //         ->get();


    //     // Transforming the data for the chart
    //     $chartData = [];
    //     foreach ($pesertas as $peserta) {
    //         $chartData[] = [
    //             'name' => $peserta->namaLomba,
    //             'data' => [$peserta->total]
    //         ];
    //     }

    //     return $chartData;
    //     // return view('users.index', ['chart' => $chart->build()]);
    // }

    public function index(DashboardChart $chart)
    {
        // $chartData = $this->getChartData();

        return view('app.admin.dashboard', ['chart' => $chart->build()]);
        // return view('app.admin.dashboard', compact('chartData'));
    }
}
