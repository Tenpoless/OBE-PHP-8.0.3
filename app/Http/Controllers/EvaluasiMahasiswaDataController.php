<?php

namespace App\Http\Controllers;

use App\Interfaces\EvalMhsDataRepositoryInterface;
use App\Http\Resources\EvalMhsDataResource;

class EvaluasiMahasiswaDataController extends Controller
{
    protected $evalMhsDataRepository;

    public function __construct(EvalMhsDataRepositoryInterface $evalMhsDataRepository)
    {
        $this->evalMhsDataRepository = $evalMhsDataRepository;
    }

    public function showByMatkul($id_matkul)
    {
        $data = $this->evalMhsDataRepository->getEvaluasiByMatkul($id_matkul);
        if ($data) {
            return new EvalMhsDataResource((object)$data);
        }
        return response()->json(['message' => 'Data not found'], 404);
    }
}
