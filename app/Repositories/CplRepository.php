<?php 

namespace App\Repositories;

use App\Interfaces\CplRepositoryInterface;
use App\Models\Cpl;
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;

class CplRepository implements CplRepositoryInterface
{
    public function getById($id_user)
    {
        // Mendapatkan id_jurusan dari id_user
        $id_jurusan = Dosen::where('id_user', $id_user)->pluck('id_jurusan')->first();

        $data = DB::table('cpl')
            ->where('id_jurusan', $id_jurusan)
            ->get();
        
        return response()->json($data);
    }
}