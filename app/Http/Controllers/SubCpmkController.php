<?php

namespace App\Http\Controllers;

use App\Interfaces\SubCpmkRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\SubCpmkResource;

class SubCpmkController extends Controller
{
    private SubCpmkRepositoryInterface $subCpmkRepositoryInterface;

    public function __construct(SubCpmkRepositoryInterface $subCpmkRepositoryInterface)
    {
        $this->subCpmkRepositoryInterface = $subCpmkRepositoryInterface;
    }

    public function show($id_detailrps)
    {
        $subcpmk = $this->subCpmkRepositoryInterface->getSubCpmkById($id_detailrps);

        if (!$subcpmk) {
            return response()->json(['message' => 'subcpmk not found'], 404);
        }
        
        return ApiResponseClass::sendResponse(new SubCpmkResource($subcpmk),'',200);
    }
}
