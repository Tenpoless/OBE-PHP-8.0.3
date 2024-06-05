<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiMk extends Model
{
    use HasFactory;

    protected $table = 'deskripsi_mk';

    protected $primaryKey = 'id_deskripsimk';

    protected $fillable = [
        'rumpun_mk',
        'deskripsi_mk',
        'id_matkul'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id_matkul');
    }
}
