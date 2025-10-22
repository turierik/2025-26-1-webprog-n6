<?php
    // 1.) generálj "Hello World" feliratú bekezdéseket, ahol
    // a betűméret 8px és 24px között egyre nagyobb
    for ($size = 8; $size <= 24; $size++)
        echo "<p style=\"font-size: {$size}px\">Hello World</p>";

    // 2.) ird ki az "árvíztűrő tükörfúrógép" szót úgy, hogy
    // minden 2. betű piros (a többi meg kék)
    
    $word = "árvíztűrő tükörfúrógép";

    for ($i = 0; $i < strlen($word); $i++){ // ékezetes betűk?
        $c = $i % 2 == 0 ? "blue" : "red";
        echo "<span style=\"color: $c\">{$word[$i]}</span>";
    }

    echo "<br>";

    foreach(mb_str_split($word) as $i => $char){ // mb = multi-byte
        $c = $i % 2 == 0 ? "blue" : "red";
        echo "<span style=\"color: $c\">{$char}</span>";
    }

    // 3.) vegyél fel egy tömböt és generálj belőle HTML-es listát
    $fruits = ["alma", "banán", "citrom"];
    echo "<ul>" . implode("", array_map(fn($f) => "<li>$f</li>", $fruits)) . "</ul>";
?> 