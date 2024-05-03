@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Konten</h3>
        <hr>
        <div class="d-md-flex justify-content-md-end mb-3">
            <a class="btn btn-primary" href="/admin/content/create" role="button">Tambah Konten</a>
        </div>
        <div class="row">
            @foreach ($contents as $content)
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($content->image) }}" class="img-fluid rounded-start" alt="{{$content->title}}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$content->title}}</h5>
                                <p class="card-text">{!! substr(strip_tags($content->content), 0, 30) !!}...</p>
                                <a href="/admin/content/{{$content->slug}}/edit" class="btn btn-primary">Edit</a>
                                <a href="/admin/content/delete/{{$content->slug}}" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop