<?php

namespace App\Http\Middleware;

use Closure;

class GameMaster
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
        if ($request->user() === null) {
            return redirect()->route('bingo');
        }

        if ($request->user()->is_admin !== 1) {
            return redirect()->route('bingo');
        }

        return $next($request);
    }
}
