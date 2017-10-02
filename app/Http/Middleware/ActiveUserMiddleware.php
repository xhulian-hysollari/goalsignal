<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class ActiveUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {

        if ($this->auth->getUser()->is_active !== 1) {
            Auth::logout();
            return back()->with('error','This account has been deactivated!');
//            abort(403, 'This user is inactive.');
        }

        return $next($request);
    }
}
