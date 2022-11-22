<?php
    // Tes Koneksi ke Database MySQL/MariaDB
    // Cara 1: MySQLi OOP
    $namaserver = "localhost";
    $username = "root";
    $password = "";

    // Membuat koneksi ke database
    $koneksi = new mysqli($namaserver, $username, $password);

    // Tes koneksi
    if ($koneksi -> connect_error) {
        die("Gagal terhubung ke database" . $koneksi->connect_error);
    } echo "Berhasil terhubung ke database";
?>