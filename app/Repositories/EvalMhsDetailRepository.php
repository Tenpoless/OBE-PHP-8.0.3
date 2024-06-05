<?php

namespace App\Repositories;

use App\Models\EvaluasiMhs;
use App\Interfaces\EvalMhsDetailRepositoryInterface;

class EvalMhsDetailRepository implements EvalMhsDetailRepositoryInterface
{
    public function findByUserId($id_user)
    {
        return EvaluasiMhs::where('id_user', $id_user)
            ->with(['cpl', 'subcpmk', 'evaluasi.detailRps'])
            ->get();
    }
}
