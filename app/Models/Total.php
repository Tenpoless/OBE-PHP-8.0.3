<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    use HasFactory;

    protected $table = 'total';

    protected $primaryKey = 'id_total';

    protected $fillable = [
        'id_cpl',
        'total_cpl',
        'id_jurusan'
    ];

    public function cpl()
    {
        return $this->belongsTo(Cpl::class, 'id_cpl', 'id_cpl');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}
