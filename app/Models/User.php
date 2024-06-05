<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_user'; // Menentukan primary key 'id_user'

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'email',
        'password',
        'status',
        'level',
        'date_created'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function verifyPassword($password)
    {
        return $this->password === md5($password);
        // return Hash::check($password, $this->password);
    }

        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the dosen associated with the user.
     */
    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id_user', 'id_user');
    }

    public function evaluasi_mhs()
    {
        return $this->hasMany(EvaluasiMhs::class, 'id_user', 'id_user');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user', 'id_user');
    }
}
