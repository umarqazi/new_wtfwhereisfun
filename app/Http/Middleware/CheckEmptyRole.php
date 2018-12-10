<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmptyRole
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
        if ($request->user()->roles->isEmpty()) {
            return redirect('select/role');
        }
        return $next($request);
    }
}
