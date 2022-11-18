<?php
    // ARRAY BERBASIS INDEX
    $minuman = "es teh"; // ini variabel
    $buah = array("apel", "jeruk", "pisang", "semangka"); // ini array
    $arr = array("apel", 12, "pisang", true); // ini array
    $jumlah_buah = count($buah);

    echo ("Saya suka minum " . $minuman . "<br>");
    echo ("Saya suka buah " . $buah[3] . "<br>");
    echo (count($buah) . "<br>");

    // looping untuk menampilkan isi array
    for ($x = 0; $x < $jumlah_buah; $x++) {
        echo "Saya suka buah " . $buah[$x] . "<br>";
    }
    // looping untuk menampilkan isi array
    foreach($buah as $buah_tunggal) {
        echo "$buah_tunggal <br>";
    }

    // ARRAY BERBASIS ASOSIASI
    $usia = array(
        "andi" => "18",
        "budi" => "22",
        "candra" => "25"
    );

    echo "Budi sekarang berusia " . $usia["budi"] . " tahun" . "<br>";
    
    // looping untuk menampilkan array asosiatif
    foreach($usia as $nama => $usia_tunggal) {
        echo "$nama sekarang berusia $usia_tunggal tahun" . "<br>";
    }

    // ARRAY MULTI DIMENSI
    $mobil = array(
        array("Toyota", 22, 5),
        array("Daihatsu", 15, 3),
        array("WUling", 10, 8)
    );

    echo "Mobil ".$mobil[0][0]." Stok tersedia ".$mobil[0][1]. " Unit Terjual ". $mobil[0][2];

?>