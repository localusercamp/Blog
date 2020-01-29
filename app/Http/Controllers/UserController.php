<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    /**
     * Возварщает представление пользователя
     *
     * @param  Request
     */
    public function show()
    {
        return view('pages.user.show');
    }
    
    /**
     * Возварщает текущего пользователя
     *
     * @param  Request
     */
    public function getCurrentUser(Request $request)
    {
        return response()->json([
            'user' =>  Auth::user()
        ]);
    }

    /**
     * Возварщает пользователя по id
     *
     * @param  Request
     * @return JSON
     */
    public function getUser(Request $request)
    {
        $user = User::with('ownedPosts','role','posts.commentaries')
            ->withCount('ownedPosts','commentaries')
            ->find((int)$request->header('userId'));

        if(!$user)
            return;

        if(Auth::check()){
            if(Auth::user()->id === $user->id)
                $user->self = true;
            else
                $user->self = false;
        }

        $users_count = 0;
        foreach($user->posts as $post){
            $users_count += count($post->users);
        }
        $user->users_count = $users_count;

        return response()->json([
            'user' =>  $user
        ]);
    }
}
