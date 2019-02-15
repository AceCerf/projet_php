<?php
session_start();
require('class/GenerateForm.php');
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    die();
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

<body>
    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.php">Médiathèque</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Accueil</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="typeFichier.php?type=audio">Musique</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="typeFichier.php?type=video">Videos</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="typeFichier.php?type=image">Images</a>
                                </li>

                                <?php 
                                //Vérification de session ouverte
                                if (isset($_SESSION["login"])){
                                    printf('<li class="nav-item active">
                                            <a class="nav-link" href="ajouterFichier.php">Ajouter</a>
                                            </li>');
                                    printf('<li><a href="logout.php" class="btn btn-outline-light top-btn"><span class="ti-plus"></span> Se  déconnecter<a></li>');                                
                                }
                                if(!isset($_SESSION["login"])){
                                    printf('<li><a href="login.php" class="btn btn-outline-light top-btn"><span class="ti-plus"></span> Se  connecter<a></li>');                    
                                }                       
                                ?>   
                                    
                                </ul>
                            </div>
                        </nav>
                </div>
            </div>
        </div>
    </div>
    <!--//END HEADER -->
    <div class="reserve-block light-bg"></div>
        <div class="light-bg">
    
            <?php
                if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-danger' role='alert'> ". $_SESSION['message'] . "</div>";
                    unset($_SESSION['message']);
                } else if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success' role='alert'> ". $_SESSION['success'] . "</div>";
                    unset($_SESSION['success']);
                }
                ?>
        </div>

            <?php             
            if (isset($_SESSION["login"])){
                printf('<div class="row">    
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <br>
                        <h4>Vous etes connecté en tant que %s</h4>
                        <p>Formulaire d\'ajout de  documents à la base</p>
                    </div>
                </div>
                </div>', $_SESSION['login']);                               
            } 
            ?>
    <!--============================= TITRE =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-offset2">
                    <h5>Selectionnez votre fichier</h5>
                </div>
                
            </div>
        </div>
    </section>
    <!--//END  -->
    
    <!--============================= DOCUMENT DETAILS =============================-->

    <section class="light-bg">
        
        <div class="container">
        <br>
            
               
                    <form action="upload.php" method="POST" enctype='multipart/form-data'>
                        <p>Formats acceptés : jpg, png, jpeg, svg, gif, ogg, webm<p>

                        <?php
                            //Formulaire d'envoi des données - envoi en POST dans le fichier ajout.php
                            $form = new GenerateForm();
                            echo "<input type='hidden' name='MAX_FILE_SIZE' value='100000000'>";
                            echo $form->inputFile('img/png, img/jpeg, img/gif, img/svg, audio/ogg, video/web') . "<br>\n";
                            echo "<p>Description</p>";
                            echo $form->inputTextArea('Description', 'Description') . "<br>\n";   
                            echo "<p></p>";     
                            //echo $form->submit() . "<br>\n";       
                        ?>  
                        <br>
                        <br>
                        <div class="featured-btn-wrap">
                        <button type='submit' class="btn btn-danger" value="Valider">Valider</button>
                        <a href="index.php" class="btn btn-danger">Retour à l'accueil</a>
                        <br>
                    </div>  
                    
                    </form>
                
            
        </div>
    </section>
    <div class="reserve-block light-bg"></div>
    <!--//END BOOKING DETAILS -->
    
   
                                  
   


    <!--============================= FOOTER =============================-->
    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">                        
                        <p>Copyright &copy; 2019 TCBG </p>          
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
</body>

</html>
