@extends('templates.layout')
@section('content')
    <div class='row'>
        <div class='col-2 mb-5'>
            <a class='btn btn-warning' href={{ route('post.create') }}>Add New Post</a>
        </div>
    </div>
    <div class='row'>
        <ul>
            @foreach ($postsList as $post)
                <div class="card mb-3 w-25">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $post->image }}" class="img-fluid rounded-start h-100" alt="post {{ $post->id }} photo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->author }}</p>
                                <a class="card-link link-success" href="{{ route('post.show', $post) }}">{{ $post->description }}...</a>
                                <p class="card-text mt-5"><small class="text-muted">Last updated {{ $post->updated_at }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
@endsection
