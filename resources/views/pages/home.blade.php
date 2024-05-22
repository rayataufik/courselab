@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="row">
        <div class="col-md-6 col-auto my-auto">
            <h1 class="display-4">Learn to code — for free.</h1>
            <p class="lead">Learn to program with our beginner-friendly tutorials and examples.</p>
            <form class="row g-3">
                <div class="col-6">
                    <input type="text" class="form-control" id="search-course" placeholder="What do you want to learn?">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-indigo mb-3">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-auto">
            <div class="image-hero d-flex justify-content-center">
                <img src="{{ asset('images/pexels-photo-7498603.jpeg') }}" class="img-fluid rounded" alt="CourseLab">
            </div>
        </div>
    </div>
</section>

<article class="popular-course">
    <div class="row mb-3">
        <div class="col">
            <h6 class="display-6">Choose what to learn</h6>
            <p class="lead">Start learning the best programming languages.</p>
        </div>
    </div>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-3 col-6">
            <div class="card">
                <img src="{{ Storage::url($category->image) }}" class="card-img-top" alt="{{$category->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    <p class="card-text">{!!$category->description!!}</p>
                    <a href="/category/{{$category->slug}}" class="btn btn-indigo">Start Learning</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</article>

<section class="jumbotron">
    <div class="p-5 indigo-500 text-white rounded text-center">
        <div class="mx-auto">
            <p class="lead"> Join our community of learners and start your journey to become a world-class developer today! <br>
                Explore our vast library of courses, connect with fellow learners, and gain the skills needed to thrive in the tech industry.
            </p>
        </div>
    </div>
</section>
@stop