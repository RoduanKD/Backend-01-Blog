@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('title') ? 'is-danger':'' }}" type="text" name="title" placeholder="Post Title ..." value="{{ old('title') }}">
                    @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                  <div class="select">
                    <select name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  @error('category_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Tags</label>
                <div class="control">
                  <div class="select is-multiple">
                    <select name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <p class="help">Click and hold ctrl key to select multiple tags</p>
                  @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Slug</label>
                <div class="control">
                    <input class="input {{ $errors->has('slug') ? 'is-danger':'' }}" type="text" name="slug" placeholder="Post Slug ..." value="{{ old('slug') }}">
                    <p class="help">a slug is something like this https://example.com/this-is-a-slug</p>
                    @error('slug')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Featured Image URL</label>
                <div class="control">
                    <input class="input {{ $errors->has('featured_image') ? 'is-danger':'' }}" type="text" name="featured_image" placeholder="https://www.domain.com/test-image.jpg" value="{{ old('featured_image') }}">
                    @error('featured_image')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>  
            <div class="field">
                <label class="label">Content</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('content') ? 'is-danger':'' }}" name="content" placeholder="Post Content goes here ...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">Save Post</button>
                </div>
              </div>
        </form>
    </div>
@endsection