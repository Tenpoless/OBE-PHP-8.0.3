<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileDosenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'nama_dosen' => $this->dosen->nama_dosen, // Menggunakan properti langsung dari model User
            'jurusan' => [
                'nama' => $this->dosen->jurusan->nama ?? null, // Menggunakan properti langsung dari model User dan Jurusan
            ],
            'email' => $this->email, // Menggunakan properti langsung dari model User
            'no_telpon' => $this->dosen->no_telpon ?? null, // Menggunakan properti langsung dari model User
        ];
    }
}
