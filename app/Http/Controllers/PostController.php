<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protect all routes in this controller
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:255'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content ?? '',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $post->update($request->only(['title', 'content']));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    private function middleware(string $string)
    {
    }
}
