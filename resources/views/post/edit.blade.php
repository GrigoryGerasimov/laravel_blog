@extends('templates.layout')
@section('content')
    <div class='row'>
        <form class='form' action="{{ route('post.update', $post) }}" method='POST'>
            @csrf
            @method('patch')
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='title'>Title</label>
                <input class='form-input col-11 border-0 border-bottom' id='title' name='title' placeholder='Title' value="{{ $post->title }}"/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='author'>Author</label>
                <input class='form-input col-11 border-0 border-bottom' id='author' name='author' placeholder='Author' value="{{ $post->author }}"/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='image'>Image</label>
                <input class='form-input col-11 border-0 border-bottom' id='image' name='image' placeholder='URL' value="{{ $post->image }}"/>
            </div>
            <div class='input-group mb-3 h-100'>
                <label class='form-label col-1' for='content'>Content</label>
                <textarea class='form-input col-11 h-auto border-0 border-bottom' id='content' name='content' placeholder='Your message...'>{{ $post->content }}</textarea>
            </div>
            <div class='btn-group mt-5 col-6 offset-3'>
                <a class='btn btn-primary' href={{ route('post.show', $post) }}>Back</a>
                <input type='reset' class='btn btn-secondary' value='Reset'/>
                <input type='submit' class='btn btn-success' value='Submit'/>
            </div>
        </form>
    </div>
@endsection
