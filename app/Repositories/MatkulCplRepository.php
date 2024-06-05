<?php

namespace App\Repositories;

use App\Interfaces\MatkulCplRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MatkulCplRepository implements MatkulCplRepositoryInterface
{
    public function getMatkulCplByUserId($userId)
    {
        return DB::table('user')
            ->join('dosen', 'user.id_user', '=', 'dosen.id_user')
            ->join('jurusan', 'dosen.id_jurusan', '=', 'jurusan.id_jurusan')
            ->join('matkul', 'jurusan.id_jurusan', '=', 'matkul.id_jurusan')
            ->join('pengampu_mk', 'matkul.id_matkul', '=', 'pengampu_mk.id_matkul')
            ->join('cpl', 'jurusan.id_jurusan', '=', 'cpl.id_jurusan')
            ->join('nilai_matkul_cpl', function($join) {
                $join->on('matkul.id_matkul', '=', 'nilai_matkul_cpl.id_matkul')
                     ->on('cpl.id_jurusan', '=', 'nilai_matkul_cpl.id_jurusan')
                     ->on('pengampu_mk.id_pengampu', '=', 'nilai_matkul_cpl.id_pengampu');
            })
            ->where('user.id_user', $userId)
            ->select('matkul.nama_matkul', 'pengampu_mk.kelas', 'cpl.kode_cpl', 'nilai_matkul_cpl.nilai_matkul_cpl')
            ->get();
    }
}
