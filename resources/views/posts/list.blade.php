@extends('templates.layout')
@section('content')
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
@endsection
