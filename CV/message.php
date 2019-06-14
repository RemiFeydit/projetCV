<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    include_once("include/head.php");
    include_once('./func/pdo.php');
    $pdo = connect_pdo();
    ?>
    <title>Messages</title>
</head>
<body>
<?php
include_once("include/header.php");

session_name();
session_start();
if(empty($_SESSION['admin'])){
  header('Location: login.php');
}
?>
<div class="row">
    <div class="col s12 m12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Messages :</span>
          <?php
          $query = $pdo->prepare('SELECT * FROM Contact');
          $query->execute();
          $messages = $query->fetchAll();
          foreach ($messages as $message)
          {
        ?>
          <div class="row">
          <div class="col s12 m4"></div>
            <div class="col s12 m4">
            <div class="card grey">
                <div class="card-content white-text">
            <p><b>Nom complet : </b></p>
            <p><?php echo $message['name']?></p>
            <p><b>Mail : </b></p>
            <p><?php echo $message['mail']?></p>
            <p><b>Objet : </b></p>
            <p><?php echo $message['subject']?></p>
            <p><b>Date d'envoi : </b></p>
            <p><?php echo $message['sendingDate']?></p>
            <p><b>Message : </b></p>
            </p><?php echo $message['message']?></p>
        </div>
        <div class="card-action">
            <a href="./deleteMessage.php?id=<?php echo $message['id']; ?>">Supprimer</a>
        </div>
      </div>
      <div class="col s12 m4"></div>
    </div>
  </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>