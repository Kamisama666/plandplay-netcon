<?php

namespace App\Http\Middleware;

use Closure;

class IsRegistrationComplete
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

        if (!$user) {
            return $next($request);
        }

        if (!$user->registration_complete) {
            return redirect()->route('post_login_post');
        }

        return $next($request);
    }
}
