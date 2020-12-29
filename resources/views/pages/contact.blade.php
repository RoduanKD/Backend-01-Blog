@extends('layouts.app')

@section('title', 'Contact Our Blog')
@section('subtitle', 'Please contact us anytime.')

@section('content')
    <div class="container">
        <h1 class="title is-1">Contact Us</h1>
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" placeholder="Text input">
            </div>
          </div>
          
          <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" placeholder="Email input">
            </div>
          </div>
          
          <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
            </div>
          </div>
          
          <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
          </div>
    </div>
@endsection