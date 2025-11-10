<?php
    $errors = [];
    if ($_GET){
        $a = $_GET["a"];
        $b = $_GET["b"];

        // validáció
        if (!is_numeric($a))
            $errors["a"] = "a szám kellene legyen!";

        if (filter_var($b, FILTER_VALIDATE_FLOAT) === false)
            $errors["b"] = "b szám kellene legyen!";
        else if ($b == 0)
            $errors["b"] = "b nem lehet 0!";

        if (count($errors) === 0)
            $x = $a / $b;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="f1.php" method="GET">
        a = <input type="text" name="a" value="<?= $a ?? "" ?>">
        <?= $errors["a"] ?? "" ?>
        <br>
        b = <input type="text" name="b" value="<?= $b ?? "" ?>">
        <?= $errors["b"] ?? "" ?>
        <br>
        <button type="submit">Divide</button>
    </form>
    <?= isset($x) ? $x : "" ?> <br>
    <?= $x ?? "" ?>
</body>
</html>