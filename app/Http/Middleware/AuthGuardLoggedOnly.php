<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

/**
 * Пропускает только авторизированного пользователя
 */
class AuthGuardLoggedOnly
{
    /**
     * @param  Request
     * @param  Closure
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
            return $next($request);
        else
            return redirect('/home');
    }
}
