<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<ul>
    @foreach ($postsList as $post)
        <li class="nav-link px-2 ">{{ $post->id }}</li>
        <li>{{ $post->title }}</li>
        <li>{{ $post->author }}</li>
        <li>{{ $post->content }}</li>
        <li>{{ $post->likes }}</li>
        <li>{{ $post->is_published }}</li>
    @endforeach
</ul>
</body>
</html>
