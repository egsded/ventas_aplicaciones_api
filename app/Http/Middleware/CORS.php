<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Headers: X-PINGOTHER, Content-Type");
        header("Access-Control-Allow-Method: POST, GET, OPTIONS");
        return $next($request);
    }
}
