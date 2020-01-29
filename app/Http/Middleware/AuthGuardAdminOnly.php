<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

/**
 * Пропускает только админа
 */
class AuthGuardAdminOnly
{
    /**
     * @param  Request
     * @param  Closure
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role->name === 'admin')
            return $next($request);
        else
            return redirect('/home');
    }
}
