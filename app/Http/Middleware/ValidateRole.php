<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ValidateRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!(auth()->user()) || auth()->user()->role !== 'admin') {
            http_response_code(403);
            exit();
        }

        return $next($request);
    }
}
