<?php
    $id = $_GET['id'] ?? -1;
    include_once("Storage.php");
    $stor = new Storage(new JsonIO('data.json'));
    $d = $stor -> findById($id);
    if ($d === null){
        header('location: index.php');
        exit();
    }

    $errors = [];
    
    if ($_POST){
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Must be a valid email!";
        }

        $negint = $_POST["negint"];
        if (filter_var($negint, FILTER_VALIDATE_INT) === false){
            $errors["negint"] = "Must be an integer!";
        } else if ($negint >= 0){
            $errors["negint"] = "Must be negative!";
        }

        $tickme = $_POST["tickme"] ?? false;
        if ($tickme != "on"){
            $errors["tickme"] = "Must be checked!";
        }

        if (count($errors) == 0){
            $stor -> update($id, [
                "email" => $email,
                "negint" => intval($negint),
                "tickme" => $tickme == "on",
                "id" => $id
            ]);
            
            header('location: index.php');
            exit();
        }
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
    <form action="edit.php?id=<?= $id ?>" method="POST">
        E-mail: <input type="text" name="email" value="<?= $email ?? $d["email"] ?>">
        <?= $errors["email"] ?? "" ?>
        <br>

        Negative integer: <input type="text" name="negint" value="<?= $negint ?? $d["negint"] ?>">
        <?= $errors["negint"] ?? "" ?>
        <br>

        <input type="checkbox" name="tickme" <?= ($tickme ?? $d["tickme"] ? "on" : "off") == "on" ? "checked" : "" ?>> Must be checked
        <?= $errors["tickme"] ?? "" ?>
        <br>

        <button type="submit">Okay</button>
    </form>
    <?php if ($_POST && count($errors) == 0): ?>
        <span style="font-size: 1.5em; color: green">Your input is valid.</span>
    <?php endif; ?>
</body>
</html>