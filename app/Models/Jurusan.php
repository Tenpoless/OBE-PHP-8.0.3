<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $primaryKey = 'id_jurusan';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kode_jurusan',
        'koordinator_jurusan',
        'id_fakultas'
    ];

    /**
     * Get the dosen that belongs to the jurusan.
     */
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_jurusan', 'id_jurusan'); // Relasi one-to-many dengan model Dosen
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_jurusan', 'id_jurusan'); // Relasi one-to-one dengan model User
    }
    
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id_fakultas');
    }
}
