<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public'); // upload image to storage directory and create symbolic link to public directory

        Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200)->save(); // fit image to custome size by package intervention

        auth()->user()->posts()->create([
            'caption' => $post['caption'],
            'image' => $imagePath
        ]); // save post by relationship

        return redirect('profile/' . auth()->user()->id);
    }

    public function edit(Post $post)
    {
        return $post;
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
