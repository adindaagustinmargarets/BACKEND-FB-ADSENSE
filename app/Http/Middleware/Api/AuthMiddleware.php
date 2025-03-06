<?php

namespace App\Http\Middleware\Api;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil token dari header Authorization
        $token = $request->header('Authorization');
        // Pastikan token ada dan memiliki format yang benar (Bearer <token>)
        if (!$token || !str_starts_with($token, 'Bearer ')) {
            return response()->json([
                'status' => '401',
                'message' => 'Maaf, Anda Tidak Diiznkan Mengaksesnya',
                'keterangan' => 'Anda Tidak memiki token yang di konfigurasi'
            ], 401);
        }
        // Ambil hanya tokennya tanpa "Bearer "
        $token = substr($token, 7);
        // Cek apakah token ada di database (tabel users)
        $user = User::where('token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'Maaf, Token Salah!!!'], 401);
        }
        // Lanjutkan request
        return $next($request);
    }
}
