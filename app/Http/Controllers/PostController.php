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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $choosenCategory = $request->header('category');
        $choosenCategory = Category::where('name', $choosenCategory)->first();
        if(!$choosenCategory){
            return;
        }
        $user = Auth::user();
        $post = new Post();
        $post->user()->associate($user);
        $post->category()->associate($choosenCategory);
        $post->title = $request->header('title');
        $post->text = $request->header('text');
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.post.show');
    }

    public function getPost(Request $request)
    {
        $post = Post::with('user','users','commentaries','commentaries.user')
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
