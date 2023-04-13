@extends('templates.layout')
@section('content')
    <div class="card mb-3">
        <img src="{{ $post->image }}" class="card-img-top" alt="post {{ $post->id }} pics">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h6 class="card-title mt-4">{{ $post->author }}</h6>
            <p class="card-text my-5">{{ $post->content }}</p>
            <p class="card-text w-100 d-flex flex-column align-items-end">
                <small class="text-muted">Created at {{ $post->created_at }}</small>
                <small class="text-muted mt-2">Last updated {{ $post->updated_at }}</small>
            </p>
            <a class="card-link link-secondary mt-4 d-block" href="{{ route('post.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 15px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>
                <small>Back to all posts</small>
            </a>
        </div>
    </div>
@endsection
