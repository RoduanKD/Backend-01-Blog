@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="title is-3">{{ $category->name }}</h3>
                <div class="content">
                    {{ $category->description }}
                </div>
                <p class="content">
                    posted at: {{ $category->created_at }}
                </p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-2">
          <a href="{{ route('categories.edit', $category->id) }}" class="button is-primary">Edit Category</a>
            </div>
            <div class="column is-2">
             <form action="{{ route('categories.destroy', $category->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input class="button is-danger" type="submit" value="Delete category">
             </form>
            </div>
        </div>
    </div>
@endsection