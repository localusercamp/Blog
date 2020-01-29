<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Commentary;
use App\Post;

class CommentaryController extends Controller
{
    /**
     * Сохраняет комментарий в базе
     *
     * @param  Request
     */
    public function store(Request $request)
    {
        if(!$post = Post::find((int)$request->header('postId')))
            return;

        $commentary = new Commentary();
        $commentary->post()->associate($post);
        $commentary->user()->associate(Auth::user());
        $commentary->text = $request->header('text');
        $commentary->save();
    }

    /**
     * @param  Request
     */
    public function update(Request $request)
    {
        $commentary = Commentary::find((int)$request->header('commentaryId'));
        $commentary->text = $request->header('text');
        $commentary->save();
    }

    /**
     * @param  Request
     */
    public function destroy(Request $request)
    {
        Commentary::find((int)$request->header('commentaryId'))->delete();
    }
}
