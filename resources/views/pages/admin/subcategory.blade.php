@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="content">
        <h3>Subkategori</h3>
        <hr>
        <div class="d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/admin/subcategory/create" role="button">Tambah Subkategori</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama subkategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                <tr>
                    <th scope="row">{{$loop -> iteration}}</th>
                    <td>{{$subcategory->category->name}}</td>
                    <td>{{$subcategory->name}}</td>
                    <td><a class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-success" href="/admin/subcategory/{{$subcategory->slug}}/edit">Edit</a> <br>
                        <a class="link-danger link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-danger" href="/admin/subcategory/delete/{{$subcategory->slug}}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop