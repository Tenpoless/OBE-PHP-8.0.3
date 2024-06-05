<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\HalUtamaRepositoryInterface;

class HalUtamaRepository implements HalUtamaRepositoryInterface
{
    public function getNamaDosen($id)
    {
        return User::findOrFail($id);
    }

    public function getProfileDosen($id)
    {
        return User::with('dosen.jurusan')->findOrFail($id);
    }
}
