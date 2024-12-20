<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $user)->with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required | image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image' => $imagePath
        ]);
   
        return redirect('/profile/'.auth()->user()->id);
    }
    public function show(Post $post)
    {
       
        return view('posts.show', compact('post'));
    }
    
}
