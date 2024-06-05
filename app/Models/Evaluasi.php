<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;
use App\Models\DetailRps;
use App\Models\Cpl;
use App\Models\Subcpmk;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';
    protected $primaryKey = 'id_evaluasi';
    public $timestamps = false;

    protected $fillable = [
        'id_detailrps',
        'asesmen',
        'detail_asesmen',
        'id_matkul'
    ];

    public function detailRps()
    {
        return $this->belongsTo(DetailRps::class, 'id_detailrps', 'id_detailrps');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id_matkul');
    }

    public function cpl()
    {
        return $this->belongsTo(Cpl::class, 'id_cpl', 'id_cpl');
    }

    public function subcpmk()
    {
        return $this->belongsTo(Subcpmk::class, 'id_subcpmk', 'id_subcpmk');
    }
}
