<?php
session_start();
$userid = $_SESSION['userid'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
        Album :
        <?php
        $sql_album = mysqli_query($conn, "select * from album where userid='$userid'");
        while ($data_album = mysqli_fetch_array($sql_album)) { ?>
        <a href="home.php?albumid=<?php echo $data_album['albumid'] ?>" class="btn btn-outline-primary">
            <?php echo $data_album['namaalbum'] ?>
        </a>
        <?php }
        ?>
        <div class="row">
            <?php
            if (isset($_GET['albumid'])) {
                $albumid = $_GET['albumid'];
                $query = mysqli_query($conn, "select * from foto where albumid='$albumid' and userid='$userid'");
                while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <img src="../asset/img/<?php echo $data['lokasifile'] ?>" alt="hii" class="card-img-top"
                        title="<?php echo $data['judulfoto'] ?>" style="height: 18rem;">
                    <div class="card-footer text-center">
                        <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="batalsuka"><i class="fa fa-heart"></i></a>
                        <?php } else { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="suka"><i class="fa-regular fa-heart"></i></a>
                        <?php }
                                $like = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' Suka';
                                ?>
                    </div>
                </div>
            </div>
            <?php }
            } else {
                $query = mysqli_query($conn, "select * from foto where userid='$userid'");
                while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <img src="../asset/img/<?php echo $data['lokasifile'] ?>" alt="hii" class="card-img-top"
                        title="<?php echo $data['judulfoto'] ?>" style="height: 18rem;">
                    <div class="card-footer text-center">
                        <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="batalsuka"><i class="fa fa-heart"></i></a>
                        <?php } else { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                            name="suka"><i class="fa-regular fa-heart"></i></a>
                        <?php }
                                $like = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' Suka';
                                ?>
                    </div>
                </div>
            </div>
            <?php }
            }
            ?>
        </div>
    </div>

    <br><br><br>
    <footer class="d-grid justify-content-center mt-5 bg-dark border-top fixed-bottom text-light">
        <p class="m-2">&copy; UKK RPL 2024 | Jakir Apriyan</p>
    </footer>
    <script src="../asset/js/bootstrap.min.js"></script>
</body>

</html>