<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CplMk extends Model
{
    use HasFactory;

    protected $table  = 'cpl_mk';

    protected $primaryKey = 'id_cplmk';

    protected $fillable = [
        'id_cpl',
        'id_matkul',
        'id_aspek'
    ];

    public function cpl()
    {
        return $this->belongsTo(Cpl::class, 'id_cpl', 'id_cpl');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkkul', 'id_matkul');
    }
}
