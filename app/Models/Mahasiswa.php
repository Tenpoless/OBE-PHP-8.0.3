<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';
    public $timestamps = false;

    protected $fillable = [
        'id_mhs',
        'nama_mhs',
        'npm',
        'eamil',
        'no_hp',
        'id_jurusan',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function matkulMhs()
    {
        return $this->hasMany(MatkulMhs::class, 'id_user', 'id_user');
    }

    public function evaluasi_mhs()
    {
        return $this->hasMany(EvaluasiMhs::class, 'id_user', 'id_user');
    }
}
