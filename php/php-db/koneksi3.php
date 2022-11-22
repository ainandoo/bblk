<?php
    // Cara 3: PDO
    $namaserver = "localhost";
    $username = "root";
    $password = "";

    try {
        $koneksi = new PDO(
            "mysql:host=$namaserver;dbname=myDB",
            $username,
            $password
        );
        $koneksi -> setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        echo "Berhasil terhubung ke database";
    } catch (PDOException $e) {
        echo "Gagal terhubung ke database" . $e->getMessage();
    }