<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h5">Masuk ke Bengkel Mega Motor</a>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="mr-2"> Sudah Punya Akun ?
                    </p>
                    <a href="/login" class="">Masuk Sekarang</a>
                </div>

                <form action="/registeruser" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Name</label>
                        <input class="form-control" name="name" type="text" placeholder="nama" aria-label="default input example">
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label fw-bolder">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label fw-bolder">No. Telpon</label>
                            <input class="form-control" type="number" min="0" name="notelpon" placeholder="no. telp"
                                aria-label="default input example">
                        </div>
                    </div>

                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bolder">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Register</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
