<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCpmk;
use App\Models\Matkul;

class DetailRps extends Model
{
    use HasFactory;

    protected $table = "detail_rps";
    protected $primaryKey = "id_detailrps";

    protected $fillable = [
        "minggu",
        "id_subcpmk",
        "indikator",
        "kriteria",
        "luring",
        "daring",
        "materi",
        "bobot",
        "id_matkul"
    ];

    // Definisikan relasi ke model SubCpmk
    public function subcpmk()
    {
        return $this->belongsTo(SubCpmk::class, 'id_subcpmk', 'id_subcpmk');
    }
    
    // Definisikan relasi ke model Matkul
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id_matkul');
    }
}
