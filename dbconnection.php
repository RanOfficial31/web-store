<?php
    $con = mysqli_connect("localhost", "root", "", "toko_online");

    // check connection
    if (mysqli_connect_errno()) {
        echo "failed to connection to mysql:" . mysqli_connect_errno();
        exit();
    }
?>