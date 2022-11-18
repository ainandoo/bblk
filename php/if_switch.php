<?php
    $nilai_ujian = 80;

    if ($nilai_ujian > 80) {
        echo "nilai akhir: A";
    } elseif ($nilai_ujian <= 80) {
        echo "nilai akhir: B";
        echo "<br>";
    } elseif ($nilai_ujian <= 70) {
        echo "nilai akhir: C";
    } else {
        echo "anda tidak lulus. silakan remidi";
    }

    
    $hasil_lab = "negatif";

    switch($hasil_lab) {
        case "positif":
            echo "silakan istirahat di rumah";
            break;
        case "negatif":
            echo "anda sehat. tetap patuhi prokes.";
            break;
        default:
            echo "perlu dilakukan pemeriksaan ulang.";
    }

?>