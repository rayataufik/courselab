@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Tambah Konten</h3>
        <hr>
        <div class="border rounded text-center p-3">
            <img id="preview" src="https://via.placeholder.com/140?text=IMAGE" alt="IMAGE" class="mt-3" />
        </div>
        <form action="/admin/content/new" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label>Tambahkan Image</label>
                <input type="file" class="form-control" name="image" id="selectImage" @error('image') is-invalid @enderror required>
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" @error('title') is-invalid @enderror required>
                @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="kategori" class="form-label">Pilih Kategori</label>
                <select class="form-select" name="category_id" id="kategori">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="subkategori" class="form-label">Pilih Subkategori</label>
                <select class="form-select" name="subcategory_id" id="subkategori" required>
                </select>
            </div>
            <div class="mt-3">
                <label>Content</label>
                <textarea id="myeditorinstance" name="content"></textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 mb-5">
                <a class="btn btn-primary" href="/admin/content" role="button">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah Content</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kategoriDropdown = document.getElementById('kategori');
        var subkategoriDropdown = document.getElementById('subkategori');

        function loadSubcategories(selectedCategoryId) {
            subkategoriDropdown.innerHTML = '';

            axios.get('/admin/content/subcategories', {
                    params: {
                        category_id: selectedCategoryId
                    }
                })
                .then(function(response) {
                    var subcategories = response.data;
                    subcategories.forEach(function(subcategory) {
                        var option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        subkategoriDropdown.appendChild(option);
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }

        var selectedCategoryId = kategoriDropdown.value;
        loadSubcategories(selectedCategoryId);

        kategoriDropdown.addEventListener('change', function() {
            var selectedCategoryId = this.value;
            loadSubcategories(selectedCategoryId);
        });
    });
</script>

@stop