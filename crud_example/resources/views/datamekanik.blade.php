@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mekanik</h1>
                        <p>List data Mekanik mega motor</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahmekanik" type="button" class="btn btn-primary my-2">Tambah <i class="fas fa-solid fa-plus"></i></a>
            <div class="p-3 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Karyawan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->kodekaryawan }}</td>
                                <td>
                                    <a href="/tampilkanmekanik/{{ $row->id }}" type="button" class="btn btn-success"><i
                                            class="fas fa-solid fa-pen"></i></a>
                                    <a href="/deletemekanik/{{ $row->id }}" type="button" class="btn btn-danger"><i
                                            class="fas fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
