<?php

namespace App\Http\Controllers;

use App\Interfaces\MatkulCplRepositoryInterface;
use App\Http\Resources\MatkulCplResource;

class MatkulCplController extends Controller
{
    protected $matkulCplRepository;

    public function __construct(MatkulCplRepositoryInterface $matkulCplRepository)
    {
        $this->matkulCplRepository = $matkulCplRepository;
    }

    public function showByUserId($userId)
    {
        $data = $this->matkulCplRepository->getMatkulCplByUserId($userId);
        return MatkulCplResource::collection($data);
    }
}
