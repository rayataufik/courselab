@extends('layouts.app')

@section('content')

<div class="forum py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>{{ $thread->title }}</h3>
      <div class="threat py-3">
        <div class="card mb-3">
          <div class="card-header">
            {{ $thread->user->name }} - {{ $thread->created_at->diffForHumans() }}
          </div>
          <div class="card-body">
            <p class="card-text">{{ $thread->body }}</p>
          </div>
        </div>
      </div>
      <h5>Answer</h5>
      <hr>
      <div class="threat py-3">
        @foreach ($thread->posts as $post)
        <div class="card mb-3">
          <div class="card-header">
            {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}
          </div>
          <div class="card-body">
            <p class="card-text">{{ $post->body }}</p>
          </div>
        </div>
        @endforeach
      </div>
      <hr>
      <h5>Your Answer</h5>
      <form action="/forum/reply/{{$thread->id}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="FormControlTextarea1" class="form-label"> Enter your description here</label>
          <textarea class="form-control" id="FormControlTextarea1" rows="3" name="body"></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2" type="submit">Post your answer</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop