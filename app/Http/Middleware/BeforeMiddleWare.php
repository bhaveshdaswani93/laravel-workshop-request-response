<?php

namespace App\Http\Middleware;

use Closure;

class BeforeMiddleWare
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
        if($request->role !== 'admin' ){
            return response()->json('Not allowed',403);
        }
        return $next($request);
    }
}
