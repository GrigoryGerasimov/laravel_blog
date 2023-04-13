@extends('templates.layout')
@section('content')
    <div class='row'>
        <form class='form' action={{ route('post.store') }} method='POST'>
            @csrf
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='title'>Title</label>
                <input class='form-input col-3 border-0 border-bottom' id='title' name='title' placeholder='Title'/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='author'>Author</label>
                <input class='form-input col-3 border-0 border-bottom' id='author' name='author' placeholder='Author'/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='image'>Image</label>
                <input class='form-input col-3 border-0 border-bottom' id='image' name='image' placeholder='URL'/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='content'>Content</label>
                <textarea class='form-input col-3 border-0 border-bottom' id='content' name='content' placeholder='Your message...'></textarea>
            </div>
            <div class='btn-group mt-5 col-4'>
                <a class='btn btn-secondary' href={{ route('post.index') }}>Back</a>
                <input type='reset' class='btn btn-danger' value='Reset'/>
                <input type='submit' class='btn btn-success' value='Submit'/>
            </div>
        </form>
    </div>
@endsection
