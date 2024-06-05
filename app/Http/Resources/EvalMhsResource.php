<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvalMhsResource extends JsonResource
{
    public function toArray($request)
    {
        $kelas = $this->pengampu_mk ? $this->pengampu_mk->kelas : null;
        $namaDosen = $this->pengampu_mk && $this->pengampu_mk->dosen ? $this->pengampu_mk->dosen->nama_dosen : null;

        return [
            'id_matkul' => $this->id_matkul,
            'nama_matkul' => $this->nama_matkul,
            'semester' => $this->semester,
            'kelas' => [
                'kelas_matkul' => $kelas
            ],
            'dosen' => [
                'nama_dosen' => $namaDosen
            ]
        ];
    }
}
