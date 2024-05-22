@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div class="toast align-items-center text-bg-primary border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
    <div class="d-flex">
      <div class="toast-body">
        {{ session('success') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
@endif

<div class="forum py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-6">
          <h5>Find topics that suits your needs</h5>
        </div>
        <div class="col-md-6">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/forum/create" role="button">Create Topic +</a>
          </div>
        </div>
      </div>
      <div class="threat py-3">
        @foreach ($threads as $thread)
        <div class="card mb-3">
          <div class="card-header">
            {{ $thread->user->name }} - {{ $thread->created_at->diffForHumans() }}
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $thread->title }}</h5>
            <p class="card-text">{{ $thread->body }}</p>
            <a href="/forum/{{$thread->slug}}" class="stretched-link"></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@stop