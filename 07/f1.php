<?php
    $x = 5;
    echo $x;
    echo($x);
    print $x;
    print($x);    

    $t = [7, 4, 2, 5];
    echo $t; // ezt nem szabad, warningot dob és "Array"-t ír ki!

    for ($i = 0; $i < count($t); $i++)
        echo $t[$i];

    foreach($t as $elem)
        echo $elem;

    foreach($t as $index => $elem)
        echo $index . "=" . $elem . "<br>"; // konkatenáció operátora a .
    
    // JS join --> PHP implode
    echo implode(", ", $t) . "<br>";

    // JS split --> PHP explode
    explode(" ", "Hello world"); // ["Hello", "world"]
    
    // JS split('') --> PHP str_split
    str_split("hello"); // ["h", "e", "l", "l", "o"]

    echo 'x = $x'; // ez nem csinál behelyettesítést
    echo "x = $x"; // ide $x-et behelyettesíti
    echo "font-size: {$x}px"; // spéci esetben (pl. nincs utána szóköz), akkor {$x}

    $car = [
        "year" => 2025,
        "model" => "Tesla Model M",
        "broken" => true
    ];
    echo $car["year"];
?>
