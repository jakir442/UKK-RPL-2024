<?php
session_start();
include 'koneksi.php';

$fotoid = $_POST['fotoid'];
$userid = $_SESSION['userid'];
$isikomentar = $_POST['isikomentar'];
$tanggallike = date('Y-m-d');

$sql = mysqli_query($conn, "insert into komentarfoto values('','$fotoid','$userid','$isikomentar','$tanggallike')");

echo "<script>
    location.href='../admin/index.php'
</script>";