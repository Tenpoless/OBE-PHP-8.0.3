<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajaran';

    protected $primaryKey = 'id_tahun';

    protected $fillable = [
        'tahun_ajaran',
        'semester_ajaran',
        'status_ajaran'
    ];
}
