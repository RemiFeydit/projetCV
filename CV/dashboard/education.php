<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    include_once("../include/head.php");
    include_once('../func/pdo.php');
    $pdo = connect_pdo();
    ?>
    <title>Éducation</title>
</head>
<body>
<?php
include_once("../include/header.php");

session_name();
session_start();
if(empty($_SESSION['admin'])){
  header('Location: ../login.php');
}
?>
<div class="row">
    <div class="col s12 m12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Éducation :</span>
          <?php
          $query = $pdo->prepare('SELECT * FROM education');
          $query->execute();
          $degrees = $query->fetchAll();
          foreach ($degrees as $degree)
          {
        ?>
          <div class="row">
          <div class="col s12 m4"></div>
            <div class="col s12 m4">
            <div class="card grey">
                <div class="card-content white-text">
            <p><b>Date début : </b></p>
            <p><?php echo $degree['startDate']?></p>
            <p><b>Date fin : </b></p>
            <p><?php echo $degree['endDate']?></p>
            <p><b>Nom école : </b></p>
            <p><?php echo $degree['schoolName']?></p>
            <p><b>Diplôme : </b></p>
            </p><?php echo $degree['degree']?></p>
            <p><b>Description : </b></p>
            </p><?php echo $degree['description']?></p>
        </div>
        <div class="card-action">
            <a class="red white-text" href="./delete/deleteEducation.php?id=<?php echo $degree['id']; ?>">Supprimer</a>
            <a class="blue darken-2 white-text" href="./edit/editEducation.php?id=<?php echo $degree['id']; ?>">Modifier</a>
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