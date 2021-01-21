@extends('layouts.app')

@section('title', 'Recent Posts')

@section('content')
<div class="container">
  <div class="columns is-multiline">
    @foreach ($categories as $category)
    <div class="column is-4">
      <a href="{{ route('categories.show', $category->id) }}">
        <div class="card">
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{ $category->name }}</p>
              </div>
            </div>
        
            <div class="content">
              {{ $category->discription }}
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  {{ $categories->links() }}
</div>
@endsection