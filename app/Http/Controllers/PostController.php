<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts.post');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|max:255'
        ]);

        auth()->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/home');
    }

    public function read(Post $post)
    {
        return view('posts.read', [
            'post' => $post,
        ]);
    }

    public function updateIndex(Post $post)
    {
        abort_if($post->user_id != auth()->id() && !auth()->user()->hasRole('admin') , 404);

        return view('posts.update', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        abort_if($post->user_id != auth()->id() && !auth()->user()->hasRole('admin'), 403);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/home');
    }

    public function delete(Post $post)
    {
        abort_if($post->user_id != auth()->id() && auth()->user()->hasRole('admin'), 403);
        $post->delete();

        return redirect('home');
    }

}
