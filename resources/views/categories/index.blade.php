@extends('layouts.app')

@section('name', 'Recent categories')

@section('content')
<div class="container">
  <div class="columns is-multiline">
    @foreach ($categories as $category)
    <div class="column is-6">
      <a href="{{ route('categories.show', $category->id) }}">
        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="name is-">{{ $category->name }}</p>
                    </div>
                </div>
                <div class="content">
                    {{ $category->description }}
                    <br>
                    <time datetime="2016-1-1">created_at : {{ $category->created_at }}</time>
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

