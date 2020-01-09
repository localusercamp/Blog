<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class RegistrationController extends Controller
{
    /** 
     * Создание нового пользователя
     * 
    */
    public function create(Request $request)
    {
        $data = [
            'email' => $request->header('email'),
            'password' => $request->header('password')
        ];

        $validator = Validator::make($data, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) { // если валидация не прошла
            return abort(404);     // КОСТЫЛЬ: при вводе мыла котрое уже есть выкнет 404 (и то вряд ли, скорее всего просто сломается)
        }

        $role = Role::where('name', 'blogger')->first();
        
        $user = new User();
        $user->role()->associate($role);
        $user->email = $request->header('email');
        $user->password = Hash::make($request->header('password'));
        $user->save();
    }
}