@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Histori List Booking Service</h1>
                        <p>Histori Data booking servis</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="p-3 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Tanggal Service</th>
                            <th scope="col">Jam Service</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->jam }}</td>
                                <td>{{ $row->status }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>

        </div>
    </div>
@endsection
