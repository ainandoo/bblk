
<h1>Halo </h1>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Membuat koneksi ke database
    $koneksi = new mysqli($servername, $username, $password);
    // Tes koneksi
    if ($koneksi -> connect_error) {
        die("Gagal terhubung ke database <br>" . $koneksi->connect_error);
    } echo "Berhasil terhubung ke database <br>";

    // Membuat database baru
    $kueri = "CREATE DATABASE bblk_latihan_php";

    if ($koneksi -> query($kueri) === TRUE) {
        echo "Database berhasil dibuat <br>";
    } else {
        echo "Database gagal dibuat <br>" . $koneksi -> error;
    }

    $koneksi -> close();

?>