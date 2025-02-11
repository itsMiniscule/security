@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; color: #333;">Edit Post</h1>
    <div style="max-width: 600px; margin: 0 auto; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <form action="{{ route('posts.update', $post) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            @method('PUT')

            <label style="font-weight: bold;">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" required style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">

            <label style="font-weight: bold;">Content</label>
            <textarea name="content" required rows="5" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%; resize: vertical;">{{ $post->content }}</textarea>

            <button type="submit" style="padding: 10px 15px; background-color: #3490dc; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Update Post
            </button>
        </form>
    </div>
@endsection
