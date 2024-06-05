<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;

    protected $table = 'cpl';

    protected $primaryKey = 'id_cpl';

    protected $fillable = [
        'id_aspek',
        'cpl',
        'sumber',
        'id_jurusan',
        'kode_cpl',
        'total_cpl'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');

    }

    public function evaluasi_mhs()
    {
        return $this->belongsTo(EvaluasiMhs::class, 'id_cpl', 'id_cpl');
    }
}
