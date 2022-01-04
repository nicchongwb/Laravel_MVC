<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // apply authenticate middleware to post() and delete() 
        $this->middleware(['auth'])->only(['post', 'delete']);
    }

    public function index()
    {
        // with() is to eager load to solve n+1 problem as reflected in laravel-debugbar query tab
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20); // Laravel Collection : n posts/page

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // Eloquent relation of user model to tell Laravel that user can have many posts
        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
