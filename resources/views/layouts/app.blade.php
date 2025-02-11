<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow-md p-4">
    <a href="{{ route('posts.index') }}" class="text-blue-500">My Posts</a>
</nav>

<div class="container mx-auto p-6">
    @yield('content')
</div>
</body>
</html>
