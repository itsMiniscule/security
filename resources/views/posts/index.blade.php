@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; color: #333;">Posts</h1>

    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('posts.create') }}">
            <button style="padding: 10px 15px; background-color: #3490dc; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Create New Post
            </button>
        </a>
    </div>

    <div style="max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: 15px;">
        @foreach ($posts as $post)
            <div style="background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); border-left: 5px solid #3490dc;">
                <h2 style="margin-bottom: 5px; color: #333;">{{ $post->title }}</h2>
                <p style="color: #555;">{{ $post->content }}</p>

                <!-- Display creator's name -->
                <p style="color: #777; font-size: 14px;">Created by: {{ $post->user->name }}</p>

                <div style="display: flex; gap: 10px;">
                    <a href="{{ route('posts.edit', $post) }}" style="text-decoration: none;">
                        <button style="padding: 5px 10px; background-color: #38c172; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding: 5px 10px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
