<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $isSecure = $request->isSecure();

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=(), usb=()');

        if ($isSecure && app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        $viteHttp = '';
        $viteWs = '';
        if (app()->environment('local')) {
            $viteHttp = ' http://localhost:5173 http://127.0.0.1:5173';
            $viteWs = ' http://localhost:5173 http://127.0.0.1:5173 ws://localhost:5173 ws://127.0.0.1:5173';
        }

        $directives = [
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline'{$viteHttp}",
            "style-src 'self' 'unsafe-inline' https://fonts.bunny.net{$viteHttp}",
            "font-src 'self' data: https://fonts.bunny.net",
            "img-src 'self' data: blob: https:",
            "connect-src 'self'{$viteWs}",
            'frame-src https://www.google.com',
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'self'",
        ];

        if ($isSecure) {
            $directives[] = 'upgrade-insecure-requests';
        }

        $response->headers->set('Content-Security-Policy', implode('; ', $directives));

        return $response;
    }
}