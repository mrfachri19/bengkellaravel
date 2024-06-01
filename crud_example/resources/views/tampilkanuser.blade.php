@extends('layout.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form action="/updateuser/{{ $data->id }}" method="POST">
                @csrf
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label fw-bolder">Name</label>
                    <input class="form-control" name="name" type="text" placeholder="nama" value="{{ $data->name }}"
                        aria-label="default input example">
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $data->email }}"
                            placeholder="email" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">No. Telpon</label>
                        <input class="form-control" type="number" min="0" name="notelpon" placeholder="no. telp" value="{{ $data->notelpon }}"
                            aria-label="default input example">
                    </div>
                </div>

                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label fw-bolder">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                        placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Save</button>
            </form>
        </div>
    </div>
@endsection
