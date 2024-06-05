<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvalMhsDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_cpl' => $this->cpl->id_cpl ?? null,
            'subcpmk' => $this->subcpmk->subcpmk ?? null,
            'asesmen' => $this->evaluasi->asesmen ?? null,
            'bobot' => $this->evaluasi->detailRps->bobot ?? null,
            'nilai_mhs' => $this->nilai_mhs,
            'bobot_mhs' => $this->bobot_mhs,
        ];
    }
}
