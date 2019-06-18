<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout Compétences</title>
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
                                <input id="skillName" type="text" name='skillName' class="validate">
                                <label for="skillName">Nom de la compétence</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="level" type="text" name="level" class="validate">
                                <label for="level">Niveau</label>
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

$skillName = $_POST['skillName'] ?? false;
$level = $_POST['level'] ?? false;
    if ($skillName && $level)
    {
        $query = 'INSERT INTO Skills(skillName, level, idAdmin) VALUES(:skillName, :level, 1)';
        $query = $pdo->prepare($query);
        $query->execute([
            'level' => $level,
            'skillName' => $skillName,
            ]);
        echo "<script type='text/javascript'>document.location.replace('../skill.php');</script>";

    }
?>
</body>
</html>