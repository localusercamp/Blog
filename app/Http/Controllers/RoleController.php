<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    /**
     * Возвращает представление создания роли пользователя
     *
     * @return View
     */
    public function create()
    {
        return view('pages.role.create');
    }

    /**
     * Сохраняет роль в базе
     *
     * @param  Request
     */
    public function store(Request $request)
    {
        $roles = Role::all();
        foreach ($roles as $role)
        {
            if($request->header('name') === $role->name){
                return;
            }
        }
        $role = new Role();
        $role->name = $request->header('name');
        $role->save();
    }
}
