<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout Expérience Professionnelle</title>
    <?php 
    include_once("../../include/head.php");
    include_once('../../func/pdo.php');
    $pdo = connectPDO();
    ?>
</head>
<body>
<?php include_once("../../include/header.php");
?>
<div class="row">
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title">Ajout :</span>
                <div class="row">
                <form class="col s12" method="POST" action="">
                <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="companyName" type="text" name="companyName"  class="validate">
                                <label for="companyName">Nom entreprise :</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="startDate" type="text" name='startDate' class="validate">
                                <label for="startDate">Date de début</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="endDate" type="text" name="endDate" class="validate">
                                <label for="endDate">Date de fin</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="jobName" type="text" name="jobName" class="validate">
                                <label for="jobName">Poste occupé :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="description" type="text" name="description" class="validate">
                                <label for="description">Description</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Ajouter<i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php

$startDate = $_POST['startDate'] ?? false;
$endDate = $_POST['endDate'] ?? false;
$companyName = $_POST['companyName'] ?? false;
$jobName = $_POST['jobName'] ?? false;
$description = $_POST['description'] ?? false;
    if ($companyName && $startDate && $endDate && $jobName && $description)
    {
        $query = 'INSERT INTO professionalExperience(companyName, startDate, endDate, jobName, description, idAdmin) VALUES(:companyName, :startDate, :endDate, :jobName, :description, 1)';
        $query = $pdo->prepare($query);
        $query->execute([
            'companyName' => $companyName,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'jobName' => $jobName,
            'description' => $description,
            ]);
        echo "<script type='text/javascript'>document.location.replace('../professionalExperience.php');</script>";

    }
?>
</body>
</html>