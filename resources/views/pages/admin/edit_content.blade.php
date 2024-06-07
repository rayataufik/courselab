@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Edit Konten</h3>
        <hr>
        <div class="border rounded text-center p-3">
            <img id="preview" src="{{ Storage::url($content->image) }}" alt="{{$content->title}}" class="mt-3" style="width: 30%; height: 30%;" />
        </div>
        <form action="/admin/content/{{$content->slug}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label>Tambahkan Image</label>
                <input type="file" class="form-control" name="image" id="selectImage" @error('image') is-invalid @enderror>
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title', $content->title)}}" @error('title') is-invalid @enderror required>
                @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="kategori" class="form-label">Pilih Kategori</label>
                <select class="form-select" name="category_id" id="kategori" disabled>
                    <option value="{{ $content->subcategory->category_id }}">
                        {{ $content->subcategory->category->name }}
                    </option>
                </select>
            </div>

            <div class="mt-3">
                <label for="subkategori" class="form-label">Pilih Subkategori</label>
                <select class="form-select" name="subcategory_id" id="subkategori" disabled>
                    <option value="{{ $content->subcategory_id }}" {{ $content->subcategory_id == $content->subcategory->id ? 'selected' : '' }}>{{$content->subcategory->name}}</option>
                </select>
            </div>
            <div class="mt-3">
                <label>Content</label>
                <textarea id="myeditorinstance" name="content">{{old('content',$content->content)}}</textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 mb-4">
                <a class="btn btn-primary" href="/admin/content" role="button">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>


@stop