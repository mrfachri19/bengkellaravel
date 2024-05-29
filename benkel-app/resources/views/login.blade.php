<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="centered-card">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="text_title">Masuk Ke Bengkel Mega Motor</h5>
                <div class="d-flex">
                    <p class="text_login mr-2">Kamu User Baru ?</p> <a href="">Daftar Sekarang</a>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bolder">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <a href="">Lupa Password ?</a>
                    <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
