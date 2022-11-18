<?php
  // Interface, mirip seperti Abstrak akan tetapi tidak bisa memiliki property,
  // semua method harus public, semua method harus abstrak (penulisan opsional),
  // class anak dapat meng-implement interface sekaligus inherit dari class lain.

  interface Hewan {
    public function suaraHewan();
  }

  class Kucing implements Hewan {
    public function suaraHewan() {
        echo "Miaw miaw <br>";
    }
  }
  class Burung implements Hewan {
    public function suaraHewan() {
        echo "Cuit cuit <br>";
    }
  }

  $garry = new Kucing();
  $tweety = new Burung();
  $peliharaan = array($garry, $tweety);

  foreach ($peliharaan as $namapeliharaan){
    $namapeliharaan -> suaraHewan();
  }
?>