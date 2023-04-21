@extends('templates.admin')
@section('admin-content')
    <div class="content-wrapper p-5">
        <div class='row g-0'>
            <div class="d-flex flex-row flex-wrap justify-content-between">
                @foreach ($postsList as $post)
                    <div class="card mb-5" style="width: 48%">
                        <div class="row g-0 h-100">
                            <div class="col-md-5">
                                <img src="{{ $post->image }}" class="img-fluid rounded-start h-100" alt="post {{ $post->id }} photo">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body d-flex flex-column flex-wrap justify-content-between h-100">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <hr/>
                                    <p class="card-subtitle">{{ $post->author }}</p>
                                    <a class="card-link link-success d-block my-3" href="{{ route('post.show', $post) }}">{{ $post->description }}...</a>
                                    <p class="card-text text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 15px">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                        <small>{{ $post->likes }}</small>
                                    </p>
                                    <p class="card-text"><small>Category: {{ $post->category->title }}</small></p>
                                    <p class="card-text d-flex justify-content-end"><small class="text-muted">Last updated {{ $post->updated_at }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $postsList->withQueryString()->links() }}
        </div>
    </div>

@endsection
