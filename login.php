<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Gallery Foto</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg border-bottom bg-dark">
        <div class="container">
            <a class="navbar-brand" style="color: #00FF00;" href="index.php">Website Gellery Foto</a>
            <button class="navbar-toggler" style="color: white;" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256"
                    width="20px" height="20px">
                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(10.66667,10.66667)">
                            <path d="M2,5v2h20v-2zM2,11v2h20v-2zM2,17v2h20v-2z"></path>
                        </g>
                    </g>
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto">

                </div>
                <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">Login</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center"><b>Daftar Akun Baru</b></div>
                    <div class="card-body">
                        <form action="config/proses_login.php" method="post">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Belum punya akun? <a href="register.php">Daftar disini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
    <footer class="d-grid justify-content-center mt-5 bg-dark border-top fixed-bottom text-light">
        <p class="m-2">&copy; UKK RPL 2024 | Jakir Apriyan</p>
    </footer>
    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>