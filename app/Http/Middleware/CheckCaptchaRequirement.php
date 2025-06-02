<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCaptchaRequirement
{
    public function handle(Request $request, Closure $next)
    {
        // Simpan dalam session kalau user sudah pernah berhasil submit bug
        if (!session()->has('is_verified_reporter')) {
            // Belum verified → wajib CAPTCHA
            session()->put('require_captcha', true);
        }

        return $next($request);
    }
}
