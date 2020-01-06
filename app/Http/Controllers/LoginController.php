<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email' => $request->header('email'),
            'password' => $request->header('password')
        ];

        if (Auth::attempt([
                'email' => $request->header('email'), 
                'password' => $request->header('password')
            ])) {
            return redirect()->intended('news');
        }

        return abort(404);   // Вместо этого нужно реализовать вывод надписи "неправильный пароль или мыло"  
    }

    public function check()
    {
        if(Auth::check())
        {
            return response()->json([
                'IsLoggined' => 'True'
            ]);
        }
        else
        {
            return response()->json([
                'IsLoggined' => 'False'
            ]);
        }
    }
}
