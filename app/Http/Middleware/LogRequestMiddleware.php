<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Récupérer le User-Agent
        $userAgent = $request->header('User-Agent');

        // Log dans storage/logs/laravel.log
        Log::info('User Agent detected', [
            'user_agent' => $userAgent
        ]);

        return $next($request);
    }
}