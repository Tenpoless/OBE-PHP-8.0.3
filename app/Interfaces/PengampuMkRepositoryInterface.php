<?php

namespace App\Interfaces;

interface PengampuMkRepositoryInterface
{
    public function getbyId();
    public function getMatkulById($id_matkul, $id_pengampu);
}
