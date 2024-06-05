<?php 


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();
        if ($user->level != $role) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}