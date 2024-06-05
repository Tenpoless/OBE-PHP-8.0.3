<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $primaryKey = 'id_dosen';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'nip',
        'nama_dosen',
        'tempat_lahir',
        'alamat',
        'no_telpon',
        'email',
        'id_jurusan',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
    public function pengampu_mk()
    {
        return $this->hasMany(PengampuMK::class, 'id_dosen', 'id_dosen');
    }

    public function matkul()
    {
        return $this->hasManyThrough(
            Matkul::class,
            PengampuMK::class,
            'id_dosen', 
            'id_matkul',
            'id_dosen', 
            'id_matkul' 
        );
    }
}
