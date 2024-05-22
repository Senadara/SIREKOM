<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        // $chart = (new LarapexChart)
        //     ->setType('bar')
        //     ->setXAxis(['LIDM', 'GEMASTIK', 'PKM'])
        //     ->setDataset([
        //         [
        //             'name' => 'Pendaftar',
        //             'data' => [15, 10, 25] // contoh data
        //         ]
        //     ]);

        // return view('app/admin/dashboard', compact('chart'));
        return view('app/admin/dashboard');
    }

}
