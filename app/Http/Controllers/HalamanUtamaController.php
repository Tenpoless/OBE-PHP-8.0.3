<?php

namespace App\Http\Controllers;

use App\Interfaces\HalUtamaRepositoryInterface;
use App\Http\Resources\HalamanUtamaResource;
use App\Http\Resources\ProfileDosenResource;
use Illuminate\Support\Facades\Auth;

class HalamanUtamaController extends Controller
{
    protected $halUtamaRepository;

    public function __construct(HalUtamaRepositoryInterface $halUtamaRepository)
    {
        $this->halUtamaRepository = $halUtamaRepository;
    }

    /**
     * Menampilkan nama dosen berdasarkan user_id.
     */
    public function getNamaDosen()
    {
        try {
            $id = Auth::id(); // Dapatkan ID pengguna yang terotentikasi
            $user = $this->halUtamaRepository->getNamaDosen($id);
            return new HalamanUtamaResource($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Menampilkan nama dosen, email, dan nomor telepon berdasarkan user_id.
     */
    public function getProfileDosen()
    {
        try {
            $id = Auth::id(); // Dapatkan ID pengguna yang terotentikasi
            $user = $this->halUtamaRepository->getProfileDosen($id);
            return new ProfileDosenResource($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
}
