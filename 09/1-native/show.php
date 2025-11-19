<?php
    $id = $_GET['id'] ?? -1;
    $data = json_decode(file_get_contents('data.json'), true);
    if (!isset($data[$id])){
        header('location: index.php');
        exit();
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
    E-mail: <?= $data[$id]["email"] ?> <br>
    Negint: <?= $data[$id]["negint"] ?> <br>
    Tickme: <?= $data[$id]["tickme"] ? "true" : "false" ?> <br>
    <a href="edit.php?id=<?= $id ?>">Szerkesztés</a> <br>
    <a href="delete.php?id=<?= $id ?>">Törlés</a>
</body>
</html>