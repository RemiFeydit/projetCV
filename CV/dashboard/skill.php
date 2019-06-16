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
    <title>Compétences</title>
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
          $query = $pdo->prepare('SELECT * FROM skills');
          $query->execute();
          $skills = $query->fetchAll();
          foreach ($skills as $skill)
          {
        ?>
          <div class="row">
          <div class="col s12 m4"></div>
            <div class="col s12 m4">
            <div class="card grey">
                <div class="card-content white-text">
            <p><b>Nom : </b></p>
            <p><?php echo $skill['skillName']?></p>
            <p><b>Niveau : </b></p>
            <p><?php echo $skill['level']?>%</p>
        </div>
        <div class="card-action">
            <a class="red white-text" href="./delete/deleteSkill.php?id=<?php echo $skill['id']; ?>">Supprimer</a>
            <a class="blue darken-2 white-text" href="./edit/editSkill.php?id=<?php echo $skill['id']; ?>">Modifier</a>
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