<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header('location: login.php');
        exit();
    }
    $id = $_SESSION['user_id'];
    include_once('Storage.php');
    $stor = new Storage(new JsonIO('users.json'));
    $user = $stor -> findById($id);
?>
<h1>Szia, <?= $user['username']?>!</h1>
<form action="logout.php" method="POST" id="logoutForm">
    <a href="#" id="logoutLink">Kijelentkezés</a>
</form>
<script>
    document.querySelector('#logoutLink').addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('#logoutForm').submit();
    })
</script>