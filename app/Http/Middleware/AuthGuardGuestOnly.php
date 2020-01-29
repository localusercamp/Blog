<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

/**
 * Пропускает только гостя
 */
class AuthGuardGuestOnly
{
    /**
     * @param  Request
     * @param  Closure
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guest())
            return $next($request);
        else
            return redirect('/home');
    }
}
