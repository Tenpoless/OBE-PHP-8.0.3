<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatkulCplResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'nama_matkul' => $this->nama_matkul,
            'kelas' => $this->kelas,
            'kode_cpl' => $this->kode_cpl,
            'nilai_matkul_cpl' => $this->nilai_matkul_cpl,
        ];
    }
}
