@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Service</h1>
                        <p>Isikan data untuk booking servis di mega motor</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form class="card p-3" method="POST" action="/insertserviceuser">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori Service</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="idkategori">
                                <option selected>Pilih Kategori</option>
                                @foreach ($data as $row)
                                    <option value={{ $row->id }}>{{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Polisi</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nomorpolisi"
                                placeholder="name@example.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal Service</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal"
                                placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jam Polisi</label>
                            <input type="time" class="form-control" id="exampleFormControlInput1" name="jam"
                                placeholder="name@example.com">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Keluhan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="keluhan" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Submit Booking</button>

            </form>
        </div>
    </div>
@endsection
