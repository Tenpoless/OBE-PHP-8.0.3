<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengampuMK extends Model
{
    use HasFactory;

    protected $table = 'pengampu_mk';

    protected $primaryKey = 'id_pengampu';

    public $timestamps = false;

    protected $fillable = [
        'id_pengampu',
        'id_dosen',
        'nama_dosen2',
        'nama_dosen3',
        'sks_praktek',
        'id_matkul',
        'koordinator',
        'kelas',
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id_matkul');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
    }

    public function matkulMhs()
    {
        return $this->hasMany(MatkulMhs::class, 'id_pengampu', 'id_pengampu');
    }
}
