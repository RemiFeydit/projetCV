<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    include_once("../include/head.php");
    include_once('../func/pdo.php');
    $pdo = connectPDO();
    ?>
    <title>Expérience Professionnelle</title>
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
          <span class="card-title">Expérience professionnelle :</span>
          <?php
          $query = $pdo->prepare('SELECT * FROM professionalexperience');
          $query->execute();
          $experiences = $query->fetchAll();
          foreach ($experiences as $experience)
          {
        ?>
          <div class="row">
          <div class="col s12 m4"></div>
            <div class="col s12 m4">
            <div class="card grey">
                <div class="card-content white-text">
            <p><b>Nom entreprise : </b></p>
            <p><?php echo $experience['companyName']?></p>
            <p><b>Date début : </b></p>
            <p><?php echo $experience['startDate']?></p>
            <p><b>Date fin : </b></p>
            <p><?php echo $experience['endDate']?></p>
            <p><b>Nom du poste occupé : </b></p>
            </p><?php echo $experience['jobName']?></p>
            <p><b>Description : </b></p>
            </p><?php echo $experience['description']?></p>
        </div>
        <div class="card-action">
            <a class="waves-effect waves-light btn red darken-2" href="./delete/deleteExpPro.php?id=<?php echo $experience['id']; ?>">Supprimer</a>
            <a class="waves-effect waves-light btn blue darken-2" href="./edit/editExpPro.php?id=<?php echo $experience['id']; ?>">Modifier</a>
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