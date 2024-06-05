<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCpmk extends Model
{
    use HasFactory;

    protected $table = "subcpmk";

    protected $primaryKey = "id_subcpmk";

    protected $fillable = [
        "kode_subcpmk",
        "subcpmk",
        "kode_baru",
        "id_cplmk",
        "id_matkul"
    ];
}
