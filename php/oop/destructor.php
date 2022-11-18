<?php
    class Buah {
        public $nama;
        public $warna;
        function __construct($nama){
            $this -> nama = $nama;
        }
        function get_nama(){
            return $this -> nama;
        }
        // method destruct, berjalan otomatis di akhir program
        function __destruct(){
            echo "Memanggil {$this->nama} <br>";
        }
    }
    $apel = new Buah("Buah Apel Jombang");
    $apel2 = new Buah("Buah Apel Malang");
?>