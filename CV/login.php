<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php 
    include_once('./func/pdo.php');
    $pdo = connect_pdo();
    ?>
    <title>Login</title>
</head>
<body>
    <header>
    <nav>
    <div class="nav-wrapper  green darken-4">
      <a href="" class="brand-logo">rfeydit.<b>fr</b></a>
    </div>
  </nav>
</header>
<main>
<?php
	session_name();
    session_start();
    


	$name = $_POST['name'] ?? false;
    $password = $_POST['password'] ?? false;
    
	if ($name && $password)
	{
        $query = 'SELECT id, name FROM userCV WHERE name = :name AND password = :password';
		$query = $pdo->prepare($query);
		$query->execute([
			'name' => $name,
			'password' => $password,
        ]);
        $user_exist = (bool) $query->fetchAll();

        if ($user_exist)
        {
            $_SESSION['admin'] = true;
        }
    }
    if (!empty($_SESSION['admin']))
    {
        header('Location: ./admin.php');
    }
?>

<div class="row">
    <div class="col s12 m4"></div>
    <div class="col s12 m4">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title">Connexion</span>
                <div class="row">
                <form class="col s12" method="POST" action="">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="user" type="text" name="name" class="validate">
                                <label for="user">User</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input id="password" type="password" name='password'class="validate">
                                <label for="password">Password</label>
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
</main>
    
</body>
</html>