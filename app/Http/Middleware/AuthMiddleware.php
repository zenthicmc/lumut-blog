<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Account;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil data akun dari sesi
        $account = session('account');

        // Cek apakah sesi account tersedia dan memiliki username
        if (!$account || !isset($account['username'])) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah username tersedia di database
        $user = Account::where('username', $account['username'])->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Akun tidak ditemukan.');
        }

        // Jika valid, lanjutkan request
        return $next($request);
    }
}
