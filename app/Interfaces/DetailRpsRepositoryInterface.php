<?php 

namespace App\Interfaces;

interface DetailRpsRepositoryInterface 
{
    public function index();
    public function getDetailRpsById($id_detailrps);
    public function getMingguByIdMatkul($id_matkul);
    public function deleteEvaluasi($id_detailrps, $id_evaluasi);
    
}