<?php
require('validateurValeurs.php');
require('class/GenerateForm.php');

session_start();

//TEST
//$_SESSION['login'] = 'Bastien';

try {
if (empty($_SESSION['login'])) {
  header('content-type: text/html; charset=utf-8');

	if (isset($_POST['login'])) {
		// login and password sent from Form

		$login = (isset($_POST['login'])) ? $_POST['login'] : NULL;
        $pass = (isset($_POST['password'])) ? $_POST['password'] : NULL;
        $login= validatorUsername($login);
        $pass= validatorPassword($pass);

		if (!$login) {
            throw new Exception('Vérifiez vos identifiants de connexion.'); 
		}

		if (!$pass) {
            throw new Exception('Vérifiez vos identifiants de connexion.'); 
        }
        
                // VERIFICATION DES INFOS DANS LA BDD
                // CODE DE VERIF ICI
                // LA SUITE EST à MODIFIER EN FONCTION DE LA BDD
                    if ($data->isDead()) { //
                    throw new Exception('Vérifiez vos identifiants de connexion.'); 
                    }
                    else { 
                        $data = $data->toArray() [0];
                        if (password_verify($pass, $rows->{'password'})) {
                            $_SESSION['login'] = $login;
                            $_SESSION['name'] = $data->{'name'};
                            $_SESSION['loggedin_time'] = time();
                            echo ("<script>setTimeout(function(){location.href ='./index.php'}, 100);</script>");
                            exit();
                        }
                            else {
                            throw new Exception('Vérifiez vos identifiants de connexion.'); 
                            }
                    }	
                    
                // FIN MODIF
            }  
        }else {
        echo 'Vous êtes connecté <a href="./bindex.php">Retour à l\'accueil</a>.';
        $msg = '';
        echo ("<script>setTimeout(function(){location.href ='./bindex.php'}, 2000);</script>");
        exit();
        } 
    }	
catch(Exception $e) {
      $msg=$e->getMessage();
      $msg= array(sprintf('<div class="alert alert-warning" role="alert">%s</div>',$msg) );  
}


?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title> Connexion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Connexion</div>
        <div class="card-body">
          <form action="" method="post" id="formLogin" >
            <div class="form-group">
              <div class="form-label-group">
                <input type="username" name="login"  id="inputUsername" placeholder="Nom d'utilisateur" required="required" autofocus="autofocus">
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password"  name="pass" id="inputPassword" placeholder="Mot de passe" required="required">
                
              </div>
            </div>
            <a class="btn btn-danger" href="javascript:{}" onclick="document.getElementById('formLogin').submit();">Se connecter</a>
          </form>
          <?php 
                if (!empty($msg)){
                    foreach($msg as $ms){
                        echo $ms;   
                    }
                    unset($msg);
                }
            ?>
        </div>
      </div>
    </div>

   
    

  </body>

</html>
