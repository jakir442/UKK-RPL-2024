<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login')
        location.href='../login.php'
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Gallery Foto</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
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
                    <a href="home.php" class="nav-link text-light">Home</a>
                    <a href="album.php" class="nav-link text-light">Album</a>
                    <a href="foto.php" class="nav-link text-light">Foto</a>
                </div>
                <a href="../config/proses_logout.php" class="btn btn-outline-danger m-1">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-header"><b>Tambah Data</b></div>
                    <div class="card-body">
                        <form action="../config/tambah_album.php" method="post">
                            <label for="" class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header"><b>Data Data</b></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>

                                    <tr class="table-dark">
                                        <th>No</th>
                                        <th>Nama Album</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>


                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                                    while ($data = mysqli_fetch_array($sql)) { ?>
                                    <tr>
                                        <th><?php echo $no++ ?></th>
                                        <th><?php echo $data['namaalbum'] ?></th>
                                        <th><?php echo $data['deskripsi'] ?></th>
                                        <th><?php echo $data['tanggaldibuat'] ?></th>
                                        <th>
                                            <!-- Button trigger modal Edit-->
                                            <button type="button" class="btn btn-warning  m-1" data-bs-toggle="modal"
                                                data-bs-target="#edit<?php echo $data['albumid'] ?>">
                                                Edit
                                            </button>

                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="edit<?php echo $data['albumid'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                                Data</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/tambah_album.php" method="post">
                                                                <input type="hidden" name="albumid"
                                                                    value="<?php echo $data['albumid'] ?>">
                                                                <label for="" class="form-label">Nama Album</label>
                                                                <input type="text" name="namaalbum" class="form-control"
                                                                    required value="<?php echo $data['namaalbum'] ?>">
                                                                <label for="" class="form-label">Deskripsi</label>
                                                                <textarea name="deskripsi" class="form-control" required
                                                                    value="<?php echo $data['deskripsi'] ?>"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning"
                                                                data-bs-dismiss="modal" name="edit">Edit</button>

                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal Hapus-->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                                                Hapus
                                            </button>

                                            <!-- Modal Hapus-->
                                            <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus
                                                                Data</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/tambah_album.php" method="post">
                                                                <input type="hidden" name="albumid"
                                                                    value="<?php echo $data['albumid'] ?>">
                                                                Apakah anda yakin akan menghapus
                                                                Album <strong><?php echo $data['namaalbum'] ?></strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger"
                                                                data-bs-dismiss="modal" name="hapus">Hapus</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>

                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
    <footer class="d-grid justify-content-center mt-5 bg-dark border-top fixed-bottom text-light">
        <p class="m-2">&copy; UKK RPL 2024 | Jakir Apriyan</p>
    </footer>
    <script src="../asset/js/bootstrap.min.js"></script>
</body>

</html>