@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Invoice</h1>
                        <p>Download Invoice</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/exportpdf/{{ $service->id }}" type="button" class="btn btn-primary my-2">Download</a>
            <div class="p-3 card">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td>{{ $service->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Service</th>
                        <td>{{ $service->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Jam Service</th>
                        <td>{{ $service->jam }}</td>
                    </tr>
                    <tr>
                        <th>Kategori Service</th>
                        <td>{{ $service->kategori->nama }}</td>
                    </tr>
                    <tr>
                        <th>Sparepart</th>
                        <td>{{ $service->sparepart->nama }}</td>
                    </tr>
                    <tr>
                        <th>ToTal</th>
                        <td>Rp. {{ $service->jumlah }}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endsection
