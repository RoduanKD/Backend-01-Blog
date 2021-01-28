@extends('layouts.app')

@section('title', 'Add new Category')

@section('content')
    <div class="container">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger':'' }}" type="text" name="name" placeholder="Category Name ..." value="{{ old('name') }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger':'' }}" name="description" placeholder="Category Description goes here ...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">Save Category</button>
                </div>
              </div>
        </form>
    </div>
@endsection