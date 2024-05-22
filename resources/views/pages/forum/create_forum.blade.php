@extends('layouts.forum')

@section('content')
<div class="forum py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>Create Topic</h1>
      <form action="/forum/store" method="POST">
        @csrf
        <div class="mb-3">
          <label for="FormControlInput1" class="form-label">Title</label>
          <input type="text" class="form-control" id="FormControlInput1" name="title">
        </div>
        <div class="mb-3">
          <label for="FormControlTextarea1" class="form-label"> Enter your description here</label>
          <textarea class="form-control" id="FormControlTextarea1" rows="3" name="body"></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2" type="submit">Create Topic +</button>
          <a class="btn btn-primary" href="/forum" role="button">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@stop