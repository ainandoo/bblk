<?php 
    // Superglobals, variabel bawaan PHP
    // https://www.php.net/manual/en/language.variables.superglobals.php

    // direktori file
    echo $_SERVER["PHP_SELF"];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];
    echo "<br>";
?>