<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Éducation</title>
    <?php 
    include_once("../../include/head.php");
    include_once('../../func/pdo.php');
    $pdo = connect_pdo();
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

$query = $pdo->prepare('SELECT * FROM education WHERE id = :id');
$query->execute([
    'id' => $id
]);
$degrees = $query->fetchAll();
foreach ($degrees as $degree)
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
                                <input id="startDate" type="text" name='startDate' value="<?= $degree['startDate']?>" class="validate">
                                <label for="startDate">Date de début</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="endDate" type="text" name="endDate" value="<?= $degree['endDate']?>" class="validate">
                                <label for="endDate">Date de fin</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="schoolName" type="text" name="schoolName" value="<?= $degree['schoolName'] ?>" class="validate">
                                <label for="schoolName">Nom école :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="degree" type="text" name="degree" value="<?= $degree['degree'] ?>" class="validate">
                                <label for="degree">Diplôme :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="description" type="text" name="description" value="<?= $degree['description'] ?>" class="validate">
                                <label for="description">Description</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php }

$startDate = $_POST['startDate'] ?? false;
$endDate = $_POST['endDate'] ?? false;
$schoolName = $_POST['schoolName'] ?? false;
$degree = $_POST['degree'] ?? false;
$description = $_POST['description'] ?? false;
    if ($schoolName && $startDate && $endDate && $degree && $description)
    {
        $query = 'UPDATE education SET startDate = :startDate , endDate = :endDate, schoolName = :schoolName, degree = :degree, description = :description WHERE id = :id';
        $query = $pdo->prepare($query);
        $query->execute([
            'schoolName' => $schoolName,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'degree' => $degree,
            'description' => $description,
            'id' => $id
            ]);
        echo "<script type='text/javascript'>document.location.replace('../education.php');</script>";

    }
?>
</body>
</html>