@extends('layouts.app')
@section('content')
<div class="list__course py-5">
  <h1>{{ $category->name }}</h1>
  <p>{!!$category->description!!}</p>
  <hr>
  @foreach ($category->subcategories as $subcategory)
  <h2>{{ $subcategory->name }}</h2>
  @foreach ($subcategory->contents as $content)
  <div>
    <div class="row">
      <div class="col-md-3 col-6 py-4">
        <div class="card">
          <img src="{{ Storage::url($content->image) }}" class="card-img-top" alt="{{$content->name}}">
          <div class="card-body">
            <h5 class="card-title">{{ $content->title }}</h5>
            <p class="card-text">{{ substr(strip_tags($content->content), 0, 100) }}...</p>
            <a href="/course/{{$content->slug}}" class="stretched-link"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endforeach
</div>
@endsection