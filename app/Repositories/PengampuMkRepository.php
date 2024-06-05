<?php 

namespace App\Repositories;

use App\Interfaces\PengampuMkRepositoryInterface;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\PengampuMk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengampuMkRepository implements PengampuMkRepositoryInterface
{
    public function getById()
    {
        //get id_user from login
        $user = Auth::user();
        $dosen = Dosen::where('id_user', $user->id_user)->firstOrFail();

        //get id_matkul and kelas from pengampu_mk
        $pengampuMk = PengampuMk::where('id_dosen', $dosen->id_dosen)
        ->orWhere('nama_dosen2', $dosen->id_dosen)
        ->orWhere('nama_dosen3', $dosen->id_dosen)
        ->get(['id_matkul', 'kelas', 'id_pengampu']);

        //get matkul data 
        $matkulId = $pengampuMk->pluck('id_matkul');
        $matkuls = Matkul::whereIn('id_matkul', $matkulId)->get()->keyBy('id_matkul');

        // Response
        $response = $pengampuMk->map(function ($pengampu) use ($matkuls) {
            $matkul = $matkuls->firstWhere('id_matkul', $pengampu->id_matkul);
            return [
                'id_matkul' => $pengampu->id_matkul,
                'id_pengampu' => $pengampu->id_pengampu,
                'nama_matkul' => $matkul ? $matkul->nama_matkul : null,
                'kelas' => $pengampu->kelas,
            ];
        });

        return $response;
    }

    public function getMatkulById($id_matkul, $id_pengampu)
    {
        $data = DB::table('pengampu_mk')
        ->where('id_matkul', $id_matkul)
        ->where('id_pengampu', $id_pengampu)
        ->limit(1)
        ->first();

        $nama_matkul = DB::table('matkul')
        ->where('id_matkul', $id_matkul)
        ->pluck('nama_matkul')
        ->first();

        $data->nama_matkul = $nama_matkul;

        return $data;
    }
}