<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Cpl extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_cpl'        => $this->id_cpl,
            'id_aspek'      => $this->id_aspek,
            'cpl'           => $this->cpl,
            'sumber'        => $this->sumber,
            'id_jurusan'    => $this->id_jurusan,
            'kode_cpl'      => $this->kode_cpl,
            'total_cpl'     => $this->total_cpl
        ];
    }
}
