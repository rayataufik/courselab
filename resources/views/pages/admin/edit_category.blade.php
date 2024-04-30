@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Edit Kategori</h3>
        <hr>
        <div class="border rounded text-center p-3">
            <img id="preview" src="{{ Storage::url($category->image) }}" alt="{{$category->name}}" class="mt-3" style="width: 50%; height: 50%;" />
        </div>
        <form action="/admin/category/new" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label>Tambahkan Image Kategori</label>
                <input type="file" class="form-control" name="image" id="selectImage" @error('image') is-invalid @enderror required>
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="name" value="{{old('name', $category->name)}}" @error('name') is-invalid @enderror required>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label>Deskripsi Kategori</label>
                <!-- <textarea class="form-control" name="description" rows="3" @error('description') is-invalid @enderror required>
                
                </textarea> -->
                {{!! $category->description!!}}
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary mb-3">Tambah Kategori</button>
            </div>
        </form>
    </div>
</div>

@stop