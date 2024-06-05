<?php

namespace App\Repositories;

use App\Interfaces\EvalMhsDataRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EvalMhsDataRepository implements EvalMhsDataRepositoryInterface
{
    public function getEvaluasiByMatkul($id_matkul)
    {
        $result = DB::table('matkul_mhs')
            ->join('pengampu_mk', 'matkul_mhs.id_pengampu', '=', 'pengampu_mk.id_pengampu')
            ->join('matkul', 'pengampu_mk.id_matkul', '=', 'matkul.id_matkul')
            ->join('user', 'matkul_mhs.id_user', '=', 'user.id_user')
            ->join('mahasiswa', 'user.id_user', '=', 'mahasiswa.id_user')
            ->join('dosen', 'pengampu_mk.id_dosen', '=', 'dosen.id_dosen')
            ->where('pengampu_mk.id_matkul', $id_matkul)
            ->select(
                'matkul.id_matkul', 
                'matkul.nama_matkul', 
                'matkul.semester',
                'pengampu_mk.kelas', 
                'dosen.nama_dosen',
                'user.id_user', 
                'mahasiswa.nama_mhs', 
                'mahasiswa.npm'
            )
            ->get();

        // Mengelompokkan data
        if ($result->isNotEmpty()) {
            $matkulData = $result->first();
            $mahasiswaList = $result->map(function ($item) {
                return [
                    'id_user' => $item->id_user,
                    'nama_mhs' => $item->nama_mhs,
                    'npm' => $item->npm,
                ];
            });

            return [
                'id_matkul' => $matkulData->id_matkul,
                'nama_matkul' => $matkulData->nama_matkul,
                'semester' => $matkulData->semester,
                'kelas' => $matkulData->kelas,
                'nama_dosen' => $matkulData->nama_dosen,
                'mahasiswa' => $mahasiswaList,
            ];
        }

        return null;
    }
}
