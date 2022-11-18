<?php
    class Buah {
        public $nama;
        public $warna;
        // constructor, method khusus dalam sebuah Class
        function __construct($nama, $warna){
            $this -> nama = $nama;
            $this -> warna = $warna;
        }
        function get_nama(){
            return $this -> nama;
        }
        function get_warna(){
            return $this -> warna;
        }
    }
    // membuat objek, wajib menuliskan argumen sesuai definisi constructor
    $apel = new Buah("Buah Apel Jombang", "Biru");
    $apel2 = new Buah("Buah Apel Malang", "Merah");
    echo $apel -> get_nama();
    echo $apel -> get_warna();
    echo "<br>";
    echo $apel2 -> get_nama();
?>