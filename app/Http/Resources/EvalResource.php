<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_evaluasi'       => $this->id_evaluasi,
            'id_detailrps'      => $this->id_detailrps,
            'asesmen'           => $this->asesmen,
            'detail_asesmen'    => $this->detail_asesmen,
            'id_matkul'         => $this->id_matkul
        ];
    }
}
