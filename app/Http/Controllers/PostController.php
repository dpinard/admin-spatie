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
        return view('post');
    }

    public function create(Request $request)
    {
        $id = Auth::Id();

        $request->validate([
            'title' => 'required',
            'content' => 'required|max:255'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $id,
        ]);

        return view('home');
    }
}
