<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings
{
    protected $idLomba;

    public function __construct($idLomba = null)
    {
        $this->idLomba = $idLomba;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = DB::table('pesertas')
            ->join('mahasiswas', 'pesertas.idMahasiswa', '=', 'mahasiswas.id')
            ->join('lombas', 'pesertas.idLomba', '=', 'lombas.id')
            ->select('mahasiswas.namaMahasiswa', 'mahasiswas.nim', 'mahasiswas.jurusan', 'mahasiswas.angkatan', 'lombas.namaLomba');

        if ($this->idLomba) {
            $query->where('pesertas.idLomba', $this->idLomba);
        }

        return $query->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama Mahasiswa',
            'NIM',
            'Jurusan',
            'Angkatan',
            'Nama Lomba'
        ];
    }
}
