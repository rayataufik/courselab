@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Edit Kategori</h3>
        <hr>
        <div class="border rounded text-center p-3">
            <img id="preview" src="{{ Storage::url($category->image) }}" alt="{{$category->name}}" class="mt-3" style="width: 50%; height: 50%;" />
        </div>
        <form action="/admin/category/{{$category->slug}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label>Tambahkan Image Kategori</label>
                <input type="file" class="form-control" name="image" id="selectImage" @error('image') is-invalid @enderror>
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class=" mt-3">
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
                <textarea id="editor" name="description">{{old('description',$category->description)}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 mb-5">
                <a class="btn btn-primary" href="/admin/category" role="button">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </div>
        </form>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@stop