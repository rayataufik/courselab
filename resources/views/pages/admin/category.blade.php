@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Kategori</h3>
        <hr>
        <div class="d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/admin/category/create" role="button">Tambah Kategori</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$loop -> iteration}}</th>
                    <td><img src="{{ Storage::url($category->image) }}" alt="{{$category->name}}" style="width: 50px; height: 50px;"></td>
                    <td>{{$category->name}}</td>
                    <td>{{ substr(strip_tags($category->description), 0, 10) }}...</td>
                    <td><a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-success" href="/admin/category/{{$category->slug}}/edit">Edit</a> <br>
                        <a class="link-danger link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-danger" href="#">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop