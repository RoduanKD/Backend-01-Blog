@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="title is-3">{{ $category->name }}</h3>
            </div>

            <div class="content">
                {{ $category->descripition }}
            </div>
            <p class="content">
                posted at: {{ $category->created_at }}
            </p>
        </div>
    </div>
    <a href="{{ route('categories.edit', $category->id) }}" class="button is-primary">Edit Category</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input class="button is-danger" type="submit" value="Delete Category">
    </form>
    </div>
@endsection
