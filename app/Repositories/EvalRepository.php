<?php

namespace App\Repositories;

use App\Models\Evaluasi;
use App\Models\DetailRps;
use App\Interfaces\EvalRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EvalRepository implements EvalRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function index(){
        return Evaluasi::all();
    }

    public function getById($id_detailrps){
        $detailrps = DetailRps::findOrFail($id_detailrps);

        $evaluasi = Evaluasi::where('id_detailrps', $detailrps->id_detailrps)->first();

        return $evaluasi;
    }

    public function getEvaluasiByMinggu($id_matkul, $id_detailrps)
    {
        $evaluasi = DB::table('detail_rps')
        ->select('detail_rps.id_detailrps', 'detail_rps.minggu', 'detail_rps.id_subcpmk', 'detail_rps.bobot', 'detail_rps.id_matkul', 'subcpmk.id_subcpmk', 'subcpmk.subcpmk', 'subcpmk.id_matkul', 'evaluasi.*') // Pilih kolom yang diperlukan
        ->leftJoin('subcpmk', 'detail_rps.id_subcpmk', '=', 'subcpmk.id_subcpmk')
        ->leftJoin('evaluasi', 'detail_rps.id_detailrps', '=', 'evaluasi.id_detailrps')
        ->where('detail_rps.id_matkul', $id_matkul)
        ->where('detail_rps.id_detailrps', $id_detailrps) // Filter berdasarkan minggu
        ->get();

        return $evaluasi;
    }

    public function store(array $data)
    {
        return Evaluasi::create($data);
    }

    public function update(array $data, $id_evaluasi)
    {
        return Evaluasi::where('id_evaluasi', $id_evaluasi)->update($data);
    }

    public function delete($id_evaluasi)
    {
        $evaluasi = Evaluasi::find($id_evaluasi);

        if (!$evaluasi) {
            return false; // Gagal menghapus karena evaluasi tidak ditemukan
        }

        $evaluasi->delete();
        return true;
    }
}