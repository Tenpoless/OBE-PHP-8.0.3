<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMatkulCpl extends Model
{
    use HasFactory;

    protected $table = 'nilai_matkul_cpl';

    protected $primaryKey = 'id_nilai_matkul_cpl';

    protected $fillable = [
        'id_nilai_matkul_cpl',
        'id_cplmk',
        'id_matkul',
        'id_pengampu',
        'nilai_matkul_cpl',
        'id_jurusan'
    ];

    public function cplmk()
    {
        return $this->belongsTo(CplMk::class, 'id_cplmk', 'id_cplmk');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id_matkul');
    }

    public function pengampu()
    {
        return $this->belongsTo(PengampuMk::class, 'id_pengampu', 'id_pengampu');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}
