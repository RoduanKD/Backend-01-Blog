@extends('layouts.app')

@section('title', 'Edit: ' . $post->title)

@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('title') ? 'is-danger':'' }}" type="text" name="title" placeholder="Post Title ..." value="{{ old('title') ?? $post->title }}">
                    @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Slug</label>
                <div class="control">
                    <input class="input {{ $errors->has('slug') ? 'is-danger':'' }}" type="text" name="slug" placeholder="Post Slug ..." value="{{ old('slug') ?? $post->slug }}">
                    @error('slug')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Featured Image URL</label>
                <div class="control">
                    <input class="input {{ $errors->has('featured_image') ? 'is-danger':'' }}" type="text" name="featured_image" placeholder="https://www.domain.com/test-image.jpg" value="{{ old('featured_image') ?? $post->featured_image }}">
                    @error('featured_image')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>  
            <div class="field">
                <label class="label">Content</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('content') ? 'is-danger':'' }}" name="content" placeholder="Post Content goes here ...">{{ old('content') ?? $post->content }}</textarea>
                    @error('content')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">Modify Post</button>
                </div>
              </div>
        </form>
    </div>
@endsection