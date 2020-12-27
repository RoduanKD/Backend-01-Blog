@extends('layouts.app')

@section('content')
<div class="container">
  <div class="columns">
    @foreach ($posts as $post)
    <div class="column is-4">
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3">
            <img src="{{ $post->featured_image }}" alt="Placeholder image">
          </figure>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4">{{ $post->title }}</p>
            </div>
          </div>
      
          <div class="content">
            {{ $post->content }}
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection