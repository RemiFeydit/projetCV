<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    include_once("../include/head.php");
    include_once('../func/pdo.php');
    $pdo = connectPDO();
    ?>
    <title>Admin</title>
</head>
<body>
<?php
include_once("../include/header.php");

session_name(); 
session_start();

if(empty($_SESSION['admin'])){
  header('Location: ./../login.php');
}
?>
<div class="row">
<div class="col s12 m4">
<div class="card grey">
        <div class="card-content white-text">
          <span class="card-title">Ajout expérience professionnel :</span>
          <a class="waves-effect waves-light btn-large" onclick="location.href = '../dashboard/add/addExpPro.php';">Ajout</a>
        </div>
      </div>
      </div>
    <div class="col s12 m4">
      <div class="card grey">
        <div class="card-content white-text">
          <span class="card-title">Ajout compétences :</span>
          <a class="waves-effect waves-light btn-large" onclick="location.href = '../dashboard/add/addSkill.php';">Ajout</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4">
    <div class="card grey">
        <div class="card-content white-text">
          <span class="card-title">Ajout éducation :</span>
          <a class="waves-effect waves-light btn-large" onclick="location.href = '../dashboard/add/addEducation.php';">Ajout</a>
        </div>
      </div>
      </div>
  </div>
  <div class="row">
<div class="col s12 m4"></div>
    <div class="col s12 m4">
      <div class="card grey">
        <div class="card-content white-text">
          <span class="card-title">Modifier informations personnelles :</span>
          <a class="waves-effect waves-light btn-large" onclick="location.href = '../dashboard/edit/editAdmin.php';">Modifier</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4">
      </div>
  </div>
</body>
</html>