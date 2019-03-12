<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class HttpLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::info(json_encode($request->all()));
        return $next($request);
    }
}
