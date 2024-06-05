<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Http\Requests\StoreEvaluasiRequest;
use App\Http\Requests\UpdateEvaluasiRequest;
use App\Interfaces\EvalRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\EvalResource;
use Illuminate\Support\Facades\DB;

class EvaluasiController extends Controller
{

    private EvalRepositoryInterface $evalRepositoryInterface;
    public function __construct(EvalRepositoryInterface $evalRepositoryInterface)
    {
        $this->evalRepositoryInterface = $evalRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->evalRepositoryInterface->index();

        return ApiResponseClass::sendResponse(EvalResource::collection($data),'', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluasiRequest $request)
    {
        $details =[
            'id_detailrps'      => $request->id_detailrps,
            'asesmen'           => $request->asesmen,
            'detail_asesmen'    => $request->detail_asesmen,
            'id_matkul'         => $request->id_matkul
        ];

        DB::beginTransaction();
        try{
            $evaluasi = $this->evalRepositoryInterface->store($details);
            
            DB::commit();
            return ApiResponseClass::sendResponse(new EvalResource($evaluasi), 'Evaluasi Create Success', 201);

        } catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_detailrps)
    {
        $evaluasi = $this->evalRepositoryInterface->getById($id_detailrps);

        return ApiResponseClass::sendResponse(new EvalResource($evaluasi),'',200);
    }

    public function showEvaluasi($id_matkul, $id_detailrps)
    {
        $evaluasi = $this->evalRepositoryInterface->getEvaluasiByMinggu($id_matkul, $id_detailrps);

        return ApiResponseClass::sendResponse($evaluasi,'',200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluasiRequest $request, $id_evaluasi)
    {
        $updateDetails =[
            'id_detailrps'      => $request->id_detailrps,
            'asesmen'           => $request->asesmen,
            'detail_asesmen'    => $request->detail_asesmen,
            'id_matkul'         => $request->id_matkul
        ];

        DB::beginTransaction();
        try{
            $evaluasi = $this->evalRepositoryInterface->update($updateDetails, $id_evaluasi);

            DB::commit();
            return ApiResponseClass::sendResponse('Evaluasi Update Successful', '',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_evaluasi)
    {
        $result = $this->evalRepositoryInterface->delete($id_evaluasi);

        if ($result) {
            return ApiResponseClass::sendResponse('true', 'Evaluasi Delete Success', 200);
        } else {
            return ApiResponseClass::sendResponse('false', 'Evaluasi Not Found', 404);
        }
    }
}