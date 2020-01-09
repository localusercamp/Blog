<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt([
                'email' => $request->header('email'), 
                'password' => $request->header('password')
            ])) {
            return;
        }
        return;   // Вместо этого нужно реализовать вывод надписи "неправильный пароль или мыло"  
    }

    public function logout(Request $request)
    {
        if(Auth::check())
        {
            Auth::logout();
        }
        return; 
    }

    public function check() // проверяет авторизирован пользователь или нет и возвращает email
    {
        if(Auth::check())
        {
            return response()->json([
                'IsLogged' => true,
                'email' => Auth::getUser()->email
            ]);
        }

        return response()->json([
            'IsLogged' => false
        ]);
    }
}
