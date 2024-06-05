<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCpmkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_subcpmk"    => $this->id_subcpmk,
            "kode_subcpmk"  => $this->kode_subcpmk,
            "subcpmk"       => $this->subcpmk,
            "kode_baru"     => $this->kode_baru,
            "id_cplmk"      => $this->id_cplmk,
            "id_matkul"     => $this->id_matkul,
        ];
    }
}
