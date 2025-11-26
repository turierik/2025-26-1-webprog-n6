<?php
    $errors = [];
    if ($_POST){
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        include_once('Storage.php');
        $stor = new Storage(new JsonIO('users.json'));

        if ($username === ""){
            $errors['username'] = 'A felhasználónév nem lehet üres!';
        } else {
            $user = $stor -> findOne(['username' => $username]);
            if ($user !== null){
                $errors['username'] = 'A felhasználónév már foglalt!';
            }
        }

        if ($password1 === "")
            $errors['password1'] = 'A jelszó nem lehet üres!';

        if ($password1 !== $password2)
            $errors['password2'] = 'A jelszavak nem egyeznek meg!';

        if (count($errors) == 0){
            $stor -> add([
                "username" => $username,
                "password" => password_hash($password1, PASSWORD_DEFAULT)
            ]);
            header('location: login.php');
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
    <form action="register.php" method="POST">
        Felhasználónév: <input type="text" name="username" value="<?= $username ?? "" ?>">
        <?= $errors['username'] ?? "" ?>
        <br>
        Jelszó: <input type="password" name="password1">
        <?= $errors['password1'] ?? "" ?>
        <br>
        Jelszó mégegyszer: <input type="password" name="password2">
        <?= $errors['password2'] ?? "" ?>
        <br>
        <button type="submit">Regisztráció</button>
    </form>
</body>
</html>