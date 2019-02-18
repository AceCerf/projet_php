<?php
require('autoload.php');
require_once('connexion.php');
    
    if (empty($_SESSION['login'])) {
        header('content-type: text/html; charset=utf-8');
    }
    if (isset($_SESSION['login'])) {
        header('location:ajouterFichier.php');
    }
    
    if (isset($_POST['nom']) AND isset($_POST['password']))  {
        $pseudo = htmlspecialchars($_POST['nom']);
        
        $pass = htmlspecialchars($_POST['password']);

        //  Récupération de l'utilisateur et de son pass hashé
        $req = $bdd->prepare('SELECT nom, password FROM users WHERE nom = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));
        $resultat = $req->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
        

    if (!$resultat)
    {
        $msg = "<div class='alert alert-danger' role='alert'> Mauvais identifiant ou mot de passe ! </div>";
        unset($_POST);
        header('content-type: text/html; charset=utf-8');
    }
    else
    {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['login'] = $pseudo;
            header('location:ajouterFichier.php');
        }
        else {
            $msg = "<div class='alert alert-danger' role='alert'> Mauvais identifiant ou mot de passe ! </div>";
            unset($_POST);     
            header('content-type: text/html; charset=utf-8');  
        }
    }
}  
?>

<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Favicons -->
    <link rel="shortcut icon" href="#">
    <!-- Page Title -->
    <title>Listing &amp; Directory Website Template</title>
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
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-dark" >


<div class="container">
    <div><br></div>
    <div class="row d-flex justify-content-center">
        <aside class="col-md-offset-3 col-md-6">

            <div class="card">          
                <?php
                    if (!empty($msg)) {
                        echo $msg;
                    }
                    unset($msg);
                ?>
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Connexion</h4>
                    <hr>
                    <p class="text-success text-center">Veuillez entrer vos identifiants</p>
                    <form action="" method="post" id="formLogin">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nom" class="form-control" placeholder="Nom d'utilisateur" type="nom">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input class="form-control" placeholder="Mot de passe" type="password" name="password">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block">Connexion</button>
                        </div> <!-- form-group// -->
                            <p class="text-center"><a href="index.php" class="btn">Retour à l'accueil</a></p>
                    </form>
                </article>
            </div> <!-- card.// -->

        </aside> <!-- col.// -->
    </div>
</div> <!-- row.// -->
<!--container end.//-->

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

   
</body>

</html>