<?php

namespace App\Http\Controllers;

use App\Interfaces\CplRepositoryInterface;
use App\Classes\ApiResponseClass;

class CplController extends Controller
{
    private CplRepositoryInterface $cplRepositoryInterface;

    public function __construct(CplRepositoryInterface $cplRepositoryInterface)
    {
        $this->cplRepositoryInterface = $cplRepositoryInterface;
    }

    public function show($id_user)
    {
        $cpl = $this->cplRepositoryInterface->getById($id_user);

        if ($cpl->isEmpty()) {
            return ApiResponseClass::sendResponse('false', 'total cpl not found', 404);
        }

        return ApiResponseClass::sendResponse($cpl, '', 200);
    }
}
