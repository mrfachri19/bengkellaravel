@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sparepart</h1>
                        <p>List data sparepart mega motor</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahsparepart" type="button" class="btn btn-primary my-2">Tambah <i
                    class="fas fa-solid fa-plus"></i></a>
            <div class="p-3 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Item</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jumlahsatuan }}</td>
                                <td>Rp. {{ $row->harga }}</td>
                                <td>
                                    <a href="/tampilkansparepart/{{ $row->id }}" type="button"
                                        class="btn btn-success"><i class="fas fa-solid fa-pen"></i></a>
                                    <a href="/deletesparepart/{{ $row->id }}" type="button" class="btn btn-danger"><i
                                            class="fas fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $data->links() }}

            </div>

        </div>
    </div>
@endsection
