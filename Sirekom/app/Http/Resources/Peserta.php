<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Peserta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'nim' => $this->nim,
            'jurusan' => $this->jurusan,
            'angkatan' => $this->angkatan,
            'namaMahasiswa' => $this->namaMahasiswa,
            'namaLomba' => $this->namaLomba,
            // 'created_at' => $this->created_at->format('Y/m/d'),
            // 'updated_at' => $this->updated_at->format('Y/m/d'),
        ];
    }
}
