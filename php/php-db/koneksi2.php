<?php
    // Cara 2: MySQLi Prosedural
    $namaserver = "localhost";
    $username = "root";
    $password = "";

    $koneksi = mysqli_connect($namaserver, $username, $password);

    if (!$koneksi) {
        die("Gagal terhubung ke database" . mysqli_connect_error());
    } echo "Berhasil terhubung ke database";
?>