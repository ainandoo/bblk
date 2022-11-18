<?php
    class Karyawan {
        // public $nama;
        private $nama;

        public function tulis_nama_karyawan($nama){
            $this -> nama = $nama;
        }
        public function ambil_nama_karyawan(){
            return $this -> nama;
        }
    }

    $outsourcing = new Karyawan();
    // $outsourcing -> nama = "Mas Joko";
    $outsourcing -> tulis_nama_karyawan("Mas Joko");
    echo $outsourcing -> ambil_nama_karyawan();
?>