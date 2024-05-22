@extends('layouts.app')

@section('content')
<div class="course__detail py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $course->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/category/{{$course->subcategory->category->slug}}">{{$course->subcategory->category->name}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$course->subcategory->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $course->title }}</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-center py-2">
                <img src="{{ Storage::url($course->image) }}" class="img-fluid rounded" alt="{{ $course->title }}" style="width: 30%;">
            </div>
            <p>{!! $course->content !!}</p>
        </div>
    </div>
    <hr>
</div>

@stop