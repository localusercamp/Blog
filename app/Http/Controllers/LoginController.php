<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{   
    /**
     * Авторизует пользователя в системе
     *
     * @param  Request
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
                'email' => $request->header('email'), 
                'password' => $request->header('password')
            ])) {
            return response()->json([
                'IsLogged' => true
            ]);
        }
        return response()->json([
            'IsLogged' => false
        ]);
    }

    /**
     *  Logout пользователя в системе
     *
     * @param  Request
     */
    public function logout(Request $request)
    {
        if(Auth::check())
        {
            Auth::logout();
        }
        return; 
    }

    /**
     *  Проверяет авторизован ли пользователя в системе
     *
     * @return  JSON
     */
    public function check()
    {
        if(Auth::check())
        {
            return response()->json([
                'IsLogged' => true,
                'email' => Auth::getUser()->email,
                'id' => Auth::getUser()->id
            ]);
        }

        return response()->json([
            'IsLogged' => false
        ]);
    }
}
