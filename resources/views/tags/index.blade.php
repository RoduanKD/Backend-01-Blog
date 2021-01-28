@extends('layouts.app')

@section('title', 'Tags Management')

@section('content')
<div class="container">
  <div class="columns is-multiline is-centered">
    <div class="column is-8">
      <table class="table is-fullwidth is-striped is-hoverable">
        <thead>
          <tr>
            <th><abbr title="Tag Name">Name</abbr></th>
            <th><abbr title="Posts">Num. Posts</abbr></th>
            <th><abbr title="Actions">Actions</abbr></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
            <td><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></td>
            <td>{{ $tag->posts->count() }}</td>
            <td>
              <div class="buttons">
                <a href="{{ route('tags.edit', $tag) }}" class="button is-warning">Edit</a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input class="button is-danger" type="submit" value="Delete">
              </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{ $tags->links() }}
</div>
@endsection