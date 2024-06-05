<?php

namespace App\Http\Controllers;

use App\Interfaces\PengampuMkRepositoryInterface;
use App\Classes\ApiResponseClass;
use Illuminate\Support\Facades\DB;


class PengampuMkController extends Controller
{
    private PengampuMkRepositoryInterface $pengampuMkRepositoryInterface;

    public function __construct(PengampuMkRepositoryInterface $pengampuMkRepositoryInterface)
    {
        $this->pengampuMkRepositoryInterface = $pengampuMkRepositoryInterface;
    }

    public function show()
    {
        $pengampu = $this->pengampuMkRepositoryInterface->getById();

        if ($pengampu->isEmpty()) {
            return ApiResponseClass::sendResponse('false', 'Pengampu not found', 404);
        }

        return ApiResponseClass::sendResponse($pengampu,'', 200);
    }

    public function showMatkul($id_matkul, $id_pengampu)
    {
        DB::beginTransaction();
        try{
            $data = $this->pengampuMkRepositoryInterface->getMatkulById($id_matkul, $id_pengampu);

            DB::commit();
            return ApiResponseClass::sendResponse($data,'',201);
        } catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }
}