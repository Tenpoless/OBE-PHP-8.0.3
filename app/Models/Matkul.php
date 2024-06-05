<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    protected $primaryKey = 'id_matkul';
    public $timestamps = false;

    protected $fillable = [
        'id_matkul',
        'nama_matkul',
        'kode_matkul',
        'sks_teori',
        'sks_praktek',
        'semester',
        'jenis_mk',
        'id_jurusan',
        'id_tahun',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function deskripsiMk()
    {
        return $this->hasOne(DeskripsiMk::class, 'id_matkul', 'id_matkul');
    }

    public function detail_rps()
    {
        return $this->belongsTo(DetailRPS::class, 'id_matkul', 'id_matkul');
    }

    public function pengampu_mk()
    {
        return $this->belongsTo(PengampuMK::class, 'id_matkul', 'id_matkul');
    }

    public function evaluasi_mhs()
    {
        return $this->belongsTo(EvaluasiMhs::class, 'id_matkul', 'id_matkul');
    }
}
