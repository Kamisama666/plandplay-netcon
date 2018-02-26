<?php

namespace App\Http\Middleware;

use Closure;

class SetTimezone
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
        $user = auth()->user();

        if (!$user || !$user->timezone) {
            return $next($request);
        }

        
        config(['app.timezone' => $user->timezone]);

        return $next($request);
    }
}
