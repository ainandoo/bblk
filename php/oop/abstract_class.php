<?php
    // Abstract class dan method, ketika class induk memiliki minimal satu method,
    // tapi memerlukan class anak untuk implementasinya, dengan ketentuan
    // method class anak namanya sama dengan induk, access modifier sama atau lebih longgar
    // jumlah argumen harus minimal sama atau (opsional) boleh lebih banyak

    abstract class Mobil {
        public $nama;
        public function __construct($nama) {
            $this -> nama = $nama;
        }
        // minimal ada satu method abstrak
        abstract public function deskripsi() : string;
    }
    
    class Honda extends Mobil {
        public function deskripsi(): string {
            return " Ini adalah mobil {$this->nama}";
        }
    }
    class Toyota extends Mobil {
        public function deskripsi(): string {
            return " Ini adalah mobil {$this->nama}";
        }
    }

    $honda1 = new Honda("Honda Jazz");
    echo $honda1 -> deskripsi() . "<br>";

    $toyota1 = new Toyota("Toyota Avanza");
    echo $toyota1 -> deskripsi() . "<br>";

    
    // Contoh lain kelas Abstrak

    abstract class Induk {
        // method abstrak dengan parameter
        abstract protected function namaDepan($nama);
    }

    class Anak extends Induk {
        // argumen bisa sama atau lebih banyak dari Induk
        public function namaDepan($nama, $sapa = "Halo"){
            if ($nama == "Joko") {
                $namadepan = "Pak ";
            } elseif ($nama == "Jeny") {
                $namadepan = "Ibu ";
            } else {
                $namadepan = "";
            }
            
            return "{$sapa} {$namadepan} {$nama}";
        }
    }

    $objek1 = new Anak();
    echo $objek1 -> namaDepan("Joko");
    echo "<br>";
    echo $objek1 -> namaDepan("Jeny");
?>