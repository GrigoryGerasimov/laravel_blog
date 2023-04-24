@extends('templates.admin')
@section('admin-content')
    <div class='row g-0 flex-column'>
        <form class='form' action="{{ route('admin.post.destroy', $post) }}" method='POST'>
            @csrf
            @method('delete')
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='title'>Title</label>
                <input class='form-input col-11 border-0 border-bottom' id='title' name='title' placeholder='Title'
                       value="{{ $post->title }}" readonly/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='author'>Author</label>
                <input class='form-input col-11 border-0 border-bottom' id='author' name='author' placeholder='Author'
                       value="{{ $post->author }}" readonly/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='image'>Image</label>
                <input class='form-input col-11 border-0 border-bottom' id='image' name='image' placeholder='URL'
                       value="{{ $post->image }}" readonly/>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='category'>Category</label>
                <select class='form-input col-11 border-0 border-bottom' id='category' name='category_id' disabled>
                    @foreach($categoriesList as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id === $post->category->id ? 'selected' : '' }}
                        >{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='tags'>Tags</label>
                <select multiple class='form-input col-11 border-0 border-bottom' id='tags' name='tags[]' disabled>
                    @foreach($tagsList as $tag)
                        <option value="{{ $tag->id }}"
                        @foreach($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected': '' }}
                            @endforeach
                        >{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class='input-group mb-3 h-100'>
                <label class='form-label col-1' for='content'>Content</label>
                <textarea class='form-input col-11 h-auto border-0 border-bottom' id='content' name='content'
                          placeholder='Your message...' readonly>{{ $post->content }}</textarea>
            </div>
            <div class='btn-group mt-5 col-6 offset-3'>
                <a class='btn btn-primary' href={{ route('post.show', $post) }}>Back</a>
                <input type='submit' class='btn btn-success' value='Submit'/>
            </div>
        </form>
    </div>
@endsection
