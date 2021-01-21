@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
            </div>
            <div class="column is-6">
                <h3 class="title is-3">{{ $post->title }}</h3>
                <h3 class="subtitle is-5">{{ $post->category->name }}</h3>
                <div class="content">
                    {{ $post->content }}
                </div>
                <p class="content">
                    posted at: {{ $post->created_at }}
                </p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-2">
              <a href="{{ route('posts.edit', $post->id) }}" class="button is-primary">Edit Post</a>
            </div>
            <div class="culomn is-2">
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="button is-danger" type="submit" value="Delete Post">
                </form>
            </div>
        </div>
    </div>
@endsection