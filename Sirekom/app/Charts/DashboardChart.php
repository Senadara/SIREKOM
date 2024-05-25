<?php

namespace App\Charts;

use App\Models\Lomba;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dataLomba = Lomba::withCount('peserta')->get();

        $lomba = $dataLomba->pluck('namaLomba')->toArray();
        $jumlahPeserta = $dataLomba->pluck('peserta_count')->toArray();

        return $this->chart->barChart()
            // Data template
            ->setTitle('Statistik')
            ->setSubtitle('Wins during season 2021.')
            ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setHeight(278)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
        // Data realtime db
        // ->addData('Jumlah Peserta', $jumlahPeserta)
        // ->setHeight(278)
        // ->setXAxis($lomba);
    }
}
