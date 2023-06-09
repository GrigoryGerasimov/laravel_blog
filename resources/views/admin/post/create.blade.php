@extends ('templates.admin')
@section('admin-content')
    <div class='row g-0 flex-column'>
        <form class='form' action={{ route('admin.post.store') }} method='POST'>
            @csrf
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='title'>Title</label>
                <input class='form-input col-11 border-0 border-bottom' id='title' name='title' placeholder='Title'
                       value="{{ old('title') }}"/>
                @error('title')
                <span class='text-danger'>{{ $message }}</span>
                @enderror
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='author'>Author</label>
                <input class='form-input col-11 border-0 border-bottom' id='author' name='author' placeholder='Author'
                       value="{{ old('author') }}"/>
                @error('author')
                <span class='text-danger'>{{ $message }}</span>
                @enderror
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='image'>Image</label>
                <input class='form-input col-11 border-0 border-bottom' id='image' name='image' placeholder='URL'
                       value="{{ old('image') }}"/>
                @error('image')
                <span class='text-danger'>{{ $message }}</span>
                @enderror
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='category'>Category</label>
                <select class='form-input col-11 border-0 border-bottom' id='category' name='category_id'>
                    @foreach($categoriesList as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class='input-group mb-3'>
                <label class='form-label col-1' for='tags'>Tags</label>
                <select multiple class='form-input col-11 border-0 border-bottom' id='tags' name='tags[]'>
                    @foreach($tagsList as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags')
                <span class='text-danger'>{{ $message }}</span>
                @enderror
            </div>
            <div class='input-group mb-3 h-100'>
                <label class='form-label col-1' for='content'>Content</label>
                <textarea class='form-input col-11 h-auto border-0 border-bottom' id='content' name='content'
                          placeholder='Your message...'>{{ old('content') }}</textarea>
                @error('content')
                <span class='text-danger'>{{ $message }}</span>
                @enderror
            </div>
            <div class='btn-group mt-5 col-6 offset-3'>
                <a class='btn btn-primary' href={{ route('post.index') }}>Back</a>
                <input type='reset' class='btn btn-secondary' value='Reset'/>
                <input type='submit' class='btn btn-success' value='Submit'/>
            </div>
        </form>
    </div>
@endsection
