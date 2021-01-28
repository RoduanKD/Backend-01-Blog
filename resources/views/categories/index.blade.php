@extends('layouts.app')

@section('title', 'Recent Posts')

@section('content')
<div class="container">
  <div class="columns is-multiline">
    @foreach ($categories as $category)
    <div class="column is-4">
      <a href="{{ route('categories.show', $category->id) }}">

              <div class="media-content">
                <p class="title is-4">{{ $category->name }}</p>
              </div>
           
        
            <div class="content">
              {{ $category->description }}
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  {{ $category->links() }}
</div>
@endsection