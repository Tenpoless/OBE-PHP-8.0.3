<?php

namespace App\Http\Controllers;

use App\Http\Resources\EvalMhsResource;
use App\Interfaces\EvalMhsRepositoryInterface;

class EvaluasiMahasiswaController extends Controller
{
    protected $evalMhsRepository;

    public function __construct(EvalMhsRepositoryInterface $evalMhsRepository)
    {
        $this->evalMhsRepository = $evalMhsRepository;
    }

    // Mengambil data evaluasi mahasiswa berdasarkan id matkul
    public function show($id_matkul)
    {
        try {
            $data = $this->evalMhsRepository->findByMatkulId($id_matkul);

            if ($data) {
                return new EvalMhsResource($data);
            }

            return response()->json(['message' => 'Data not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
}
