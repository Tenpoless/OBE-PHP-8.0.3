<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;
use App\Models\Cpl;
use App\Models\Subcpmk;
use App\Models\Evaluasi;
use App\Models\DetailRps;
use App\Models\User;

class EvaluasiMhs extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_mhs';
    protected $primaryKey = 'id_evaluasimhs';
    public $timestamps = false;

    protected $fillable = [
        'id_evaluasimhs',
        'id_evaluasi2',
        'nilai_mhs',
        'bobot_mhs',
        'id_matkul',
        'id_user',
        'id_cpl',
        'id_subcpmk',
        'id_detailrps'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id_matkul');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function cpl()
    {
        return $this->belongsTo(Cpl::class, 'id_cpl', 'id_cpl');
    }

    public function subcpmk()
    {
        return $this->belongsTo(Subcpmk::class, 'id_subcpmk', 'id_subcpmk');
    }

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class, 'id_evaluasi2', 'id_evaluasi');
    }

    public function detailRps()
    {
        return $this->belongsTo(DetailRps::class, 'id_detailrps', 'id_detailrps');
    }
}
