<?php

namespace App\Charts;

use App\Models\Lomba;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class DashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $competitions = DB::table('lombas')
            ->leftJoin('pesertas', 'lombas.id', '=', 'pesertas.idLomba')
            ->select('lombas.namaLomba', DB::raw('COUNT(pesertas.id) as total_peserta'))
            ->groupBy('lombas.namaLomba')
            ->orderBy('total_peserta', 'desc')
            ->get();

        $chart = new \ArielMejiaDev\LarapexCharts\BarChart();
        $chart->setTitle('Jumlah Pendaftar')
            ->setXAxis($competitions->pluck('namaLomba')->toArray())
            ->setHeight(278)
            ->addData('Peserta', $competitions->pluck('total_peserta')->toArray());

        return $chart;
    }
}
