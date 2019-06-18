<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier informations personnelles</title>
    <?php 
    include_once("../../include/head.php");
    include_once('../../func/pdo.php');
    session_name(); 
    session_start();

    if(empty($_SESSION['admin'])){
    header('Location: ./../../login.php');
    }
    $pdo = connectPDO();
    ?>
</head>
<body>
<?php include_once("../../include/header.php");

$query = $pdo->prepare('SELECT * FROM Admin');
$query->execute();
$admins = $query->fetchAll();
foreach ($admins as $admin)
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
                                <input id="lastName" type="text" name='lastName' value="<?= $admin['lastName']?>" class="validate">
                                <label for="lastName">Nom de famille</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="description" type="text" name="description" value="<?= $admin['description']?>" class="validate">
                                <label for="description">Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="mail" type="text" name="mail" value="<?= $admin['mail'] ?>" class="validate">
                                <label for="mail">Mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="telephoneNumber" type="text" name="telephoneNumber" value="<?= $admin['telephoneNumber'] ?>" class="validate">
                                <label for="telephoneNumber">Numéro de téléphone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="address" type="text" name="address" value="<?= $admin['address'] ?>" class="validate">
                                <label for="address">Adresse</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="postalCode" type="text" name="postalCode" value="<?= $admin['postalCode'] ?>" class="validate">
                                <label for="postalCode">Code postal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="city" type="text" name="city" value="<?= $admin['city'] ?>" class="validate">
                                <label for="city">Ville</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="picture" type="text" name="picture" value="<?= $admin['picture'] ?>" class="validate">
                                <label for="picture">Chemin photo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="languages" type="text" name="languages" value="<?= $admin['languages'] ?>" class="validate">
                                <label for="languages">Langues</label>
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

$lastName = $_POST['lastName'] ?? false;
$description = $_POST['description'] ?? false;
$mail = $_POST['mail'] ?? false;
$telephoneNumber = $_POST['telephoneNumber'] ?? false;
$address = $_POST['address'] ?? false;
$postalCode = $_POST['postalCode'] ?? false;
$city = $_POST['city'] ?? false;
$picture = $_POST['picture'] ?? false;
$languages = $_POST['languages'] ?? false;


    if ($lastName && $description && $mail && $telephoneNumber && $address && $postalCode && $city && $picture && $languages)
    {
        $query = 'UPDATE Admin SET lastName = :lastName , description = :description, mail = :mail, telephoneNumber = :telephoneNumber, address = :address, postalCode = :postalCode, city = :city, picture = :picture, languages = :languages WHERE id = 1';
        $query = $pdo->prepare($query);
        $query->execute([
            'mail' => $mail,
            'lastName' => $lastName,
            'description' => $description,
            'telephoneNumber' => $telephoneNumber,
            'address' => $address,
            'postalCode' => $postalCode,
            'city' => $city,
            'picture' => $picture,
            'languages' => $languages
            ]);
        echo "<script type='text/javascript'>document.location.replace('../dashboard.php');</script>";

    }
?>
</body>
</html>