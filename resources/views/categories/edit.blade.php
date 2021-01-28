@extends('layouts.app')

@section('name', 'Edit: ' . $category->name)

@section('content')
    <div class="container">
        <form action="{{ route('categories.update', $category->id) }}" method="category">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger':'' }}" type="text" name="name" placeholder="category Name ..." value="{{ old('name') ?? $category->name }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger':'' }}" name="description" placeholder="Category Description goes here ...">{{ old('description') ?? $category->description }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">Modify category</button>
                </div>
              </div>
        </form>
    </div>
@endsection
