@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Kategori</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form action="/insertkategori" method="POST" enctype="multipart/form-data" class="card p-3">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="kategori"
                        name="nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kode</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Kode"
                        name="kode">
                    @error('kode')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@endsection
