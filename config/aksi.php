<?php
if (isset($_POST['status']) != 'login') {
    echo "<script>
        alert('Anda belum login')
        location.href='../login.php'
    </script>";
}