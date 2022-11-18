<?php
    $x = 1;
    $y = 2;

    while($x <= 5) {
        echo "Nilai X sekarang: $x <br>";
        $x++;
        // $x+=3;
    }

    do {
        echo "Nilai Y sekarang: $y <br>";
        $y++;
    } while($y <= 5);

    for($z = 0; $z <= 5; $z++) {
        echo "Nilai Z sekarang: $z <br>";
    }
?>