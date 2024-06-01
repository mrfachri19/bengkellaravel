@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kategori Servis</h1>
                        <p>List data kategori mega motor</p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahkategori" type="button" class="btn btn-primary my-2">Tambah <i
                    class="fas fa-solid fa-plus"></i></a>
            <div class="p-3 card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode</th>
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
                                <td>{{ $row->kode }}</td>
                                <td>
                                    <a href="/tampilkankategori/{{ $row->id }}" type="button"
                                        class="btn btn-success"><i class="fas fa-solid fa-pen"></i></a>
                                    <a href="#" type="button"
                                        data-id="{{ $row->id }}" class="btn btn-danger delete"><i
                                            class="fas fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script>
        $('.delete').click(function() {
            var dataid = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "Kamu yakin ingin menghapus data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/deletekategori/" + dataid + ""
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });
    </script>
@endsection
