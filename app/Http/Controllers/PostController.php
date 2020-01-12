<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;
use App\User;
use Debugbar;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
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
    public function show($id)
    {
        //
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
        $posts = Post::with('user','users')->withCount('users')->get();

        if($request->header('filter')){
            $this::byFilter($posts, $request->header('filter'));
        }
        if($request->header('category')){
            $this::byCategory($posts, $request->header('category'));
        }

        return response()->json([
            'posts' => $posts
        ]);
    }
    
    public function byFilter(&$querry, $filter)
    {
        switch($filter){
            case 'like':
                $querry = $querry->sortByDesc('users_count');
            default:
                $querry = $querry->sortByDesc('created_at');
        }
    }
    
    public function byCategory(&$querry, $category)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $querry = $querry->where('category_id', $category->id);
    }

    public function like(Request $request)
    {
        if(Auth::check()){
            $post = Post::find((int)($request->header('postId')));

            if($post->users()->where('user_id', Auth::user()->id)->detach()){
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
