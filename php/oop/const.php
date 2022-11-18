<?php
    class PesanPesan {
        const TERIMA_KASIH = "Terima kasih telah berkunjung di BBLK <br>";
        const BIRU_LAUT = "#12ff44";

        public function pintuKeluar(){
            echo self::TERIMA_KASIH;
            echo self::BIRU_LAUT;
        }
    }

    echo PesanPesan::TERIMA_KASIH;

    $pesan1 = new PesanPesan();
    $pesan1 -> pintuKeluar();
?>