<?php
    var_dump($_POST);
    $errors = [];
    if ($_POST){
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors["email"] = "Legyen valid email!";

        $two_words = trim($_POST["two_words"]);
        if (count(explode(" ", $two_words)) < 2)
            $errors["two_words"] = "Legalább 2 szó legyen!";

        $seven = trim($_POST["seven"]);
        if (mb_strlen($seven) != 7)
            $errors["seven"] = "Legyen 7 karakter!";

        $negint = $_POST["negint"];
        if (filter_var($negint, FILTER_VALIDATE_INT) === false)
            $errors["negint"] = "Legyen egész!";
        else if ($negint >= 0)
            $errors["negint"] = "Legyen negatív!";

        $accept = $_POST["accept"] ?? false;
        if ($accept != "on")
            $errors["accept"] = "Muszáj bepipálni!"; 

        $color = $_POST["color"];
        if (!in_array($color, ["red", "green", "blue"]))
            $errors["color"] = "Érvénytelen szín!";
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
    <form action="f2.php" method="POST">
        E-mail: <input type="text" name="email" value="<?= $email ?? ""?>">
        <br>

        Legalább 2 szó: <input type="text" name="two_words" value="<?= $two_words ?? ""?>">
        <br>

        Pontosan 7 karakter: <input type="text" name="seven" value="<?= $seven ?? "" ?>">
        <br>

        Negatív egész: <input type="text" name="negint" value="<?= $negint ?>">
        <br>

        <input type="checkbox" name="accept" <?= ($accept ?? false) == "on" ? "checked" : "" ?> > Elfogadom a mindent.
        <br>

        Kedvenc színem: <select name="color">
            <option value="red" <?= ($color ?? false) == "red" ? "selected" : "" ?>>Piros</option>
            <option value="green" <?= ($color ?? false) == "green" ? "selected" : "" ?>>Zöld</option>
            <option value="blue" <?= ($color ?? false) == "blue" ? "selected" : "" ?>>Kék</option>
            <option value="other" <?= ($color ?? false) == "other" ? "selected" : "" ?>>Egyéb (rossz válasz)</option>
        </select><br>

        Bankkártya (XXXX-XXXX-XXXX-XXXX): <input type="text" name="card">
        <br>

        <button type="submit">Küldés</button>
    </form>
</body>
</html>