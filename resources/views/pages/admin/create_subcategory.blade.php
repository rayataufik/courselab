@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Tambah Subkategori</h3>
        <hr>
        <form action="/admin/subcategory/new" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label>Nama Subkategori</label>
                <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror required>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="kategori" class="form-label">Pilih Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary mb-3">Tambah Subkategori</button>
            </div>
        </form>
    </div>
</div>

@stop