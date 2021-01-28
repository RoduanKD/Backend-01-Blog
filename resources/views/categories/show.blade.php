@extends('layouts.app')

@section('name', $category->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="name is-3">{{ $category->name }}</h3>
                <div class="content">
                    {{ $category->description }}
                </div>
                <p class="content">
                    Created at: {{ $category->created_at }}
                </p>
            </div>
        </div>
        <a href="{{ route('categories.edit', $category->id) }}" class="button is-primary">Edit Category</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input class="button is-danger" type="submit" value="Delete category">
        </form>
    </div>
@endsection
