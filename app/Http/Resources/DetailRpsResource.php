<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailRpsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_detailrps'  => $this->id_detailrps,
            'minggu'        => $this->minggu,
            'id_subcpmk'    => $this->id_subcpmk,
            'indikator'     => $this->indikator,
            'kriteria'      => $this->kriteria,
            'luring'        => $this->luring,
            'daring'        => $this->daring,
            'materi'        => $this->materi,
            'bobot'         => $this->bobot,
            'id_matkul'     => $this->id_matkul

        ];
    }
}
