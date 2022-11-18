<?php
    // Ini adalah Class, blueprint, template, cetakan, dari program
    class Buah {
        // ini adalah properties (variabel dalam OOP)
        public $nama;
        public $warna;

        // ini adalah method (fungsi dalam OOP)
        function set_nama($nama){
            $this -> nama = $nama;
        }
        function get_nama(){
            return $this -> nama;
        }
    }

    // membuat objek $apel dan $jeruk, instance dari class Buah
    $apel = new Buah();
    $jeruk = new Buah();

    $apel -> set_nama("Buah Apel");
    $jeruk -> set_nama("Buah Jeruk");
    echo $apel -> get_nama();
    echo "<br>";
    echo $jeruk -> get_nama();
?>