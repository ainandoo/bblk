<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $nama_db = "bblk_latihan_php";

    // Membuat koneksi ke database
    $koneksi = new mysqli($servername, $username, $password, $nama_db);
    // Tes koneksi
    if ($koneksi -> connect_error) {
        die("Gagal terhubung ke database <br>" . $koneksi->connect_error);
    } echo "Berhasil terhubung ke database <br>";

    // kueri sql
    $kueri = "CREATE TABLE Pegawai (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama_depan VARCHAR(30) NOT NULL,
        nama_belakang VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        tgl_gabung TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($koneksi -> query($kueri) === TRUE){
        echo "Tabel Pegawai berhasil dibuat";
    } else {
        echo "Error pada saat membuat tabel" . $koneksi -> error; 
    }
    $koneksi -> close();

?>