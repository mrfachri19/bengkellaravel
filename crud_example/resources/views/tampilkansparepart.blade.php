@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Sparepart</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form action="/updatesparepart/{{ $data->id }}" method="POST" enctype="multipart/form-data" class="card p-3">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis Sparepart</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Nama Sparepart" name="nama" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1"
                        placeholder="Jumlah Sparepart" name="jumlahsatuan" value="{{ $data->jumlahsatuan }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga Satuan</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1"
                        placeholder="Harga Satuan" name="harga" value="{{ $data->harga }}">
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@endsection
