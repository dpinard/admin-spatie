<?php

namespace App\Http\Middleware;

use Closure;


class updateLastConnection
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
        if (auth()->check()){
            auth()->user()->update([
                'last_connection_at' => now(),
            ]);
        }
        return $next($request);
    }
}
