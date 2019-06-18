<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier compétences</title>
    <?php 
    include_once("../../include/head.php");
    include_once('../../func/pdo.php');
    $pdo = connectPDO();
    ?>
</head>
<body>
<?php include_once("../../include/header.php");
$id = $_GET['id'] ?? false;
if ($id === false)
{
    header('Location: ../dashboard.php');
    exit();
}

$query = $pdo->prepare('SELECT * FROM Skills WHERE id = :id');
$query->execute([
    'id' => $id
]);
$skills = $query->fetchAll();
foreach ($skills as $skill)
{
?>
<div class="row">
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title">Modification</span>
                <div class="row">
                <form class="col s12" method="POST" action="">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="skillName" type="text" name="skillName" value="<?= $skill['skillName']?>" class="validate">
                                <label for="skillName">Nom de la compétence</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="level" type="text" name='level' value="<?= $skill['level']?>" class="validate">
                                <label for="level">Niveau (en %) :</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Modifier<i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php }

$skillName = $_POST['skillName'] ?? false;
$level = $_POST['level'] ?? false;
    if ($skillName && $level)
    {
        $query = 'UPDATE Skills SET skillName = :skillName, level = :level WHERE id = :id';
        $query = $pdo->prepare($query);
        $query->execute([
            'skillName' => $skillName,
            'level' => $level,
            'id' => $id
            ]);
        echo "<script type='text/javascript'>document.location.replace('../skill.php');</script>";

    }
?>
</body>
</html>