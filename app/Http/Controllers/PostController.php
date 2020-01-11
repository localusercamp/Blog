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

    public function postsOfCategory(Request $request)
    {
        $choosenCategory = $request->header('category');
        $categories = Category::all();
        foreach($categories as $category){
            if($choosenCategory === $category->name){
                $posts = Post::where('category_id', $category->id)->get();
                return response()->json([
                    'posts' => $posts
                ]);
            }
        }
    }   
    public function allPostsFilter(Request $request)
    {
        $posts;
        if($request->header('filter') === 'date'){
            $posts = Post::with('user','users')->withCount('users')->get()->sortBy('created_at');
        }
        else if($request->header('filter') === 'like'){
            $posts = Post::with('user', 'users')->withCount('users')->get();
            $posts = $posts->sortBy(function($post){
                return $post->users_count;
            });
        }
        return response()->json([
            'posts' => $posts
        ]);
    }
    ////////



    public function posts(Request $request)
    {
        $posts;
        if($request->header('filter') === 'date'){
            $posts = Post::with('user','users')->withCount('users')->get()->sortBy('created_at');
        }
        else if($request->header('filter') === 'like'){
            $posts = Post::with('user', 'users')->withCount('users')->get();
            $posts = $posts->sortBy(function($post){
                return $post->users_count;
            });
        }
        return response()->json([
            'posts' => $posts
        ]);
    }
    public function byFilter($querry, $filter)
    {
        switch($filter){
            case 'like':
                $querry = $querry
                ->withCount('users')
                ->sortBy('users_count');
                break;

            default:
            $querry = $querry->sortBy('created_at');
        
        }
    }
}
