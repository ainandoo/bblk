<?php 
    // OPERATOR
    
    // Aritmatika (+, -, *, /, %, **)
    $a = "10"; // string
    $x = 10; // integer
    $y = 3;
    $z = $x % $y;

    // Assignment, penugasan (+=, -=, *=, /=, %=)
    // $penambahan = $x += $y ; // $x = $x + $y
    // $pengurangan = $x -= 5 ; // $x = $x - 5
    // $perkalian = $y *= 3 ; // $y = $y * 3
    // echo $penambahan;

    // Comparison, perbandingan (==, ===, !=, !==, >, <, >=, <=)
    // var_dump($x == $a);
    // echo "<br>";
    // echo $a . " + " . $x . " = " . ($a+$x);
    // echo ($x+$y)*($a-$y)/$x;
    // var_dump($x < $y);

    // Increment/Decrement (++, --)
    $x++; // x = x + 1
    $y--; // y = y - 1
    echo $x;
    echo "<br>";
    echo $y;
    echo "<br>";

    // Logical (&&, ||, !)
    if ($x == 10 || $y == 2) {
        echo "x dan y bernilai true";
    } else {
        echo "x dan y tidak bernilai true (false)";
    }

?>