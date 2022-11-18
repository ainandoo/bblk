<?php
    // FUNGSI BAWAAN, SUDAH DIDEFINISIKAN, TINGGAL DIPANGGIL
    echo("");
    //var_dump($x);
    array();

    // FUNGSI YANG DIDEFINISIKAN, KEMUDIAN DI PANGGIL
    function tulisPesan() {
        echo "Halo dunia! <br>";
    }
    tulisPesan();

    // FUNGSI DENGAN ARGUMEN
    function namaPanggilan($panggilan, $gelar){
        echo " Selamat pagi, $panggilan Ainan $gelar <br>";

    }
    namaPanggilan("Pak", "Instruktur");
    namaPanggilan("Mister", "Trainer");
    
    // FUNGSI DENGAN RETURN KEYWORD
    function penjumlahan($a, $b) {
        return $a + $b;
    }

    penjumlahan(3, 4);
