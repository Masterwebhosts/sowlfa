<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriberMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (
            ! auth()->check()
            || auth()->user()->role !== 'subscriber'
        ) {
            abort(403);
        }

        return $next($request);
    }
}

