<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Возвращает представление создания поста
     *
     * @return View
     */
    public function create()
    {
        return view("pages.post.create");
    }

    /**
     * Сохраняет пост в базе
     *
     * @param  Request
     */
    public function store(Request $request)
    {
        $choosenCategory = $request->header('category');
        $choosenCategory = Category::where('name', $choosenCategory)->first();
        $user = Auth::user();
        $post = new Post();
        $post->user()->associate($user);
        $post->category()->associate($choosenCategory);
        $post->title = $request->header('title');
        $post->text = $request->header('text');
        $post->save();
    }

    /**
     * Возвращает представление поста
     *
     * @return View
     */
    public function show()
    {
        return view('pages.post.show');
    }

    /**
     * Возвращает пост
     *
     * @return JSON
     */
    public function getPost(Request $request)
    {
        $post = Post::with('user','users','category','commentaries','commentaries.user')
            ->withCount('users','commentaries')
            ->find((int)$request->header('postId'));
            
        if(!$post)
            return;

        if(Auth::check()){
            if($post->users()->get()->contains(Auth::user()))
                $post->liked = true;
            else
                $post->liked = false;
        }

        return response()->json([
            'post' =>  $post
        ]);
    }

    /**
     * Возвращает представление изменения поста
     *
     * @param  int  $id
     * @param  Request
     * @return View
     */
    public function edit(Request $request, $id)
    {
        if(Auth::user()->posts->contains($id))
            return view("pages.post.edit");
        return abort('404');
    }

    /**
     * @param  Request
     */
    public function update(Request $request)
    {
        $post = Post::find((int)$request->header('postId'));
        $post->text = $request->header('text');
        $post->title = $request->header('title');
        $post->category()
            ->associate(
                Category::where('name', $request->header('category'))
                ->firstOrFail()
            );
        $post->save();
    }

    /**
     * @param  Request
     * @return Redirect
     */
    public function destroy(Request $request)
    {
        if($post = Post::find($request->header('postId')))
            $post->delete();
        return redirect('/home');
    }

    /**
     * Сортировка постов по категории и фильтру
     * 
     * @param  Request
     * @return JSON
     */
    public function postsBy(Request $request)
    {
        $posts = Post::with('user','users')->withCount('users');

        if($request->header('filter'))
            $this::byFilter($posts, $request->header('filter'));
        
        if($request->header('category'))
            $this::byCategory($posts, $request->header('category'));
        
        $posts = $posts->get();

        if(Auth::check())
            $this::isLiked($posts, Auth::user());
        
        return response()->json([
            'posts' =>  $posts
        ]);
    }
    
    public function byFilter(&$posts, $filter)
    {
        switch($filter){
            case 'like':
                $posts = $posts->orderBy('users_count', 'desc');
            default:
                $posts = $posts->orderBy('created_at', 'desc');
        }
    }
    
    public function byCategory(&$posts, $category)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $posts = $posts->where('category_id', $category->id);
    }

    public function isLiked(&$posts, $user)
    {
        foreach($posts as &$post){
            if($post->users()->get()->contains($user))
                $post->liked = true;
            else
                $post->liked = false;
        }
        unset($post);
    }

    /**
     * Добавляет или удаляет пользователя
     * из списка пользователей, которым
     * понравился пост (лайк/анлайк)
     * 
     * @param  Request
     * @return JSON
     */
    public function like(Request $request)
    {
        if(Auth::check()){
            $post = Post::find((int)($request->header('postId')));

            if($post->users()->where('user_id', Auth::user()->id)->detach(Auth::user())){
                return response()->json([
                    'answer' => 'wasLiked'
                ]);
            }
            
            $post->users()->attach(Auth::user());
            $post->save();

            return response()->json([
                'answer' => 'wasntLiked'
            ]);
        }
        return response()->json([
            'answer' => 'noLogin'
        ]);
    }
}
