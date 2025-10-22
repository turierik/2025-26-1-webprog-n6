<?php
    $numbers = [4, 1, -3, 0, 7, 8, 6, 2, -7, 9];
    // dokumentáció: php.net
    var_dump($numbers);

    // 1.) válogasd ki és írasd ki a páros számokat
    $zero = 0;
    $evens = array_filter($numbers, fn($x) => $x % 2 == $zero);

    $evens = array_filter($numbers, function($x) use ($zero){
        // use ($zero) nélkül ez nem látja a $zero-t! a closure nem lát ki magából!
        return $x % 2 == $zero;
    });

    echo "<br>";
    var_dump($evens);

    echo "<br>";

    // 2.) hány negatív szám van?
    echo count(array_filter($numbers, fn($x) => $x < 0)) . "<br>";

    // 3.) emelj négyzetre minden számot
    echo implode(", ", array_map(fn($x) => $x * $x, $numbers)) . "<br>";

    // 4.) melyik a legnagyobb szám?
    echo max($numbers) . "<br>";

    // 5.) mennyi a számok összege?
    echo array_sum($numbers) . "<br>";

?>