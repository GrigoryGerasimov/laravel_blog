<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Blog</title>
</head>
<body>
<div class='navbar navbar-expand-lg navbar-dark bg-dark px-5'>
    <a class='navbar-brand' href=''>BLOG</a>
    <div class='collapse navbar-collapse'>
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('main') }}>Main</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('about') }}>About</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('posts.list') }}>Posts</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('posts.create') }}>Create Post</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('posts.update') }}>Update Post</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('posts.delete') }}>Delete Post</a>
            </li>
        </ul>
    </div>
</div>
@yield('content')
</body>
</html>
