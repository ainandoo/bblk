<?php
    // Inheritance, pewarisan pada Class
    class Buah {
        public $nama;
        public $warna;
        public function __construct($nama, $warna){
            $this -> nama = $nama;
            $this -> warna = $warna;
        }
        // coba public dan protected, pahami bedanya
        public function cetak_pesan(){
            echo "cetak pesan dari Buah: Ini adalah buah {$this->nama} dan warnanya {$this->warna} <br>";
        }
    }
    class Berry extends Buah {
        public $berat;
        public function __construct($nama, $warna, $berat){
            $this->nama = $nama;
            $this->warna = $warna;
            $this->berat = $berat;
        }
        public function cetak_pesan(){
            echo "Cetak pesan dari Berry: Ini adalah buah {$this->nama} dan warnanya {$this->warna} 
            serta beratnya {$this->berat} gram <br>";
        }
        public function pesan(){
            echo "Pesan: Ini adalah buah jenis Berry <br>";
            // mengakses protected method
            // $this -> cetak_pesan();
        }
    }

    $blueberry = new Berry("Blueberry", "Biru", 50);
    $blueberry -> pesan();
    $blueberry -> cetak_pesan();
    $strawberry = new Buah("Strawberry", "Merah");
    $strawberry -> cetak_pesan();
?>