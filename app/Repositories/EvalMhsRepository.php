<?php

namespace App\Repositories;

use App\Models\Matkul;
use App\Interfaces\EvalMhsRepositoryInterface;

class EvalMhsRepository implements EvalMhsRepositoryInterface
{
    public function findByMatkulId($id)
    {
        // Menggunakan first() untuk mendapatkan satu model daripada koleksi
        return Matkul::where('id_matkul', $id)->first();
    }
}
