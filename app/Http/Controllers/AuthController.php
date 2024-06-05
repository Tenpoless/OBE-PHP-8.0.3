<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $users = User::where('email', $credentials['email'])->get();

        if ($users->isEmpty()) {
            return response()->json(['error' => 'Email atau Password salah'], 401);
        }

        foreach ($users as $user) {
            if ($user->verifyPassword($credentials['password'])) {
                if (in_array($user->level, [3, 4])) {
                    $token = JWTAuth::fromUser($user);

                    $level = $user->level;

                    $id_user = $user->id_user;

                    $status = $user->status;

                    return response()->json(compact('token', 'level', 'id_user', 'status'));
                } else {
                    return response()->json(['error' => 'Anda tidak terdaftar'], 401);
                }
            }
        }
        return response()->json(['error' => 'Email atau Password salah'], 401);
    }
}
