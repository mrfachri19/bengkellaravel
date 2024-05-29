@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jadwal Servis</h1>
                        <p>List Jadwal mega motor</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahjadwal" type="button" class="btn btn-primary my-2">Tambah <i class="fas fa-solid fa-plus"></i></a>
            <div class="p-3 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Hari Kerja</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->day }}</td>
                                <td>{{ $row->starttime }}</td>
                                <td>{{ $row->endtime }}</td>
                                <td>
                                    <a href="/tampilkanjadwal/{{ $row->id }}" type="button"
                                        class="btn btn-success"><i class="fas fa-solid fa-pen"></i></a>
                                    <a href="/deletejadwal/{{ $row->id }}" type="button" class="btn btn-danger"><i
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
