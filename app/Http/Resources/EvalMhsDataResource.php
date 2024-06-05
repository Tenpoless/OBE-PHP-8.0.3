<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvalMhsDataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'nama_dosen' => $this->nama_dosen,
            'matkul' => [
                'id_matkul' => $this->id_matkul,
                'nama_matkul' => $this->nama_matkul,
                'semester' => $this->semester,
                'kelas' => $this->kelas,
            ],
            'mahasiswa' => $this->mahasiswa,
        ];
    }
}
