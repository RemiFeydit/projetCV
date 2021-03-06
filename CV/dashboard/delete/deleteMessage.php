<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    include_once("../../include/head.php");
    include_once('../../func/pdo.php');
    $pdo = connectPDO();
    ?>
    <title>Suppresion</title>
</head>
<body>
<?php
    include_once("../../include/header.php");

    
    session_name(); 
    session_start();
    if(empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    }

    $id = $_GET['id'] ?? false;
    if ($id === false)
    {
        header('Location: ../dashboard.php');
        exit();
    }

    $query = 'DELETE FROM contact WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);

    header('Location: ../message.php');
?>
    
</body>
</html>