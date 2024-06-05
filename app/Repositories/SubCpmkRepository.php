<?php

namespace App\Repositories;

use App\Models\SubCpmk;
use App\Models\DetailRps;
use App\Interfaces\SubCpmkRepositoryInterface;

class SubCpmkRepository implements SubCpmkRepositoryInterface
{
    public function getSubCpmkById($id_detailrps)
    {
        // Menggunakan findOrFail untuk mendapatkan DetailRps berdasarkan id
        $detailRps = DetailRps::findOrFail($id_detailrps);

        // Menemukan SubCpmk yang memiliki id_subcpmk yang sama dengan id_subcpmk DetailRps
        $subCpmk = SubCpmk::findOrFail($detailRps->id_subcpmk);

        return $subCpmk;
    }
}