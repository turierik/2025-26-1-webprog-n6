<?php
    $id = $_GET['id'] ?? -1;
    include_once("Storage.php");
    $stor = new Storage(new JsonIO('data.json'));
    $stor -> delete($id);
    header('location: index.php');
?>