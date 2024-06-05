<?php 

namespace App\Http\Controllers;

use App\Http\Resources\DetailRpsResource;
use App\Classes\ApiResponseClass;
use App\Interfaces\DetailRpsRepositoryInterface;

class DetailRpsController extends Controller 
{
    private DetailRpsRepositoryInterface $detailRpsRepositoryInterface;

    public function __construct(DetailRpsRepositoryInterface $detailRpsRepositoryInterface)
    {
        $this->detailRpsRepositoryInterface = $detailRpsRepositoryInterface;
    }

    public function index()
    {
        $data = $this->detailRpsRepositoryInterface->index();

        return ApiResponseClass::sendResponse(DetailRpsResource::collection($data),'',200);
    }

    public function show($id_detailrps)
    {
        $detailRps = $this->detailRpsRepositoryInterface->getDetailRpsById($id_detailrps);

        return ApiResponseClass::sendResponse(new DetailRpsResource($detailRps),'',200);
    }

    public function showMinggu($id_matkul)
    {
        // Mengambil minggu berdasarkan id_matkul dari repository
        $minggu = $this->detailRpsRepositoryInterface->getMingguByIdMatkul($id_matkul);

        return ApiResponseClass::sendResponse($minggu, '', 200);
    }
}