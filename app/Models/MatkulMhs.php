<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulMhs extends Model
{
    use HasFactory;

    protected $table = 'matkul_mhs';
    protected $primaryKey = 'id_matkulmhs';
    public $incrementing = true;

    protected $fillable = [
        'id_matkulmhs',
        'id_pengampu',
        'id_user'
    ];

    public function pengampuMK()
    {
        return $this->belongsTo(PengampuMK::class, 'id_pengampu', 'id_pengampu');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_user', 'id_user');
    }
}
