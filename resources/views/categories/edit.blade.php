@extends('layouts.app')

@section('title', 'Edit: ' . $category->name)

@section('content')
    <div class="container">
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('title') ? 'is-danger':'' }}" type="text" name="title" placeholder="Category Name ..." value="{{ old('Name') ?? $category->name }}">
                    @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            
            <div class="field">
                <label class="label">description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger':'' }}" name="description" placeholder="Category description goes here ...">{{ old('description') ?? $category->description }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">Modify Category</button>
                </div>
              </div>
        </form>
    </div>
@endsection