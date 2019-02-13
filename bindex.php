<?php
session_start();
require('autoload.php');
require('class/GenerateForm.php');
//$_SESSION['login'] = "Bob";
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
    <title> Accueil Médiathèque</title>
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

<body>
    <!--============================= HEADER =============================-->
    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.html">Médiathèque</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Accueil</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="detail.php?type=musique">Musique</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="detail.php?type=video">Videos</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="detail.php?type=image">Images</a>
                                </li>

                                <?php 
                                //Vérification de session ouverte
                                if (isset($_SESSION["login"])){
                                    printf('<li class="nav-item active">
                                            <a class="nav-link" href="ajoutFichier.php">Ajouter</a>
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
    </div>
    <!-- SLIDER -->
    <section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Recherche de fichier Multimédia</h1>
                                    <h5>Parcourez la base contenant des fichiers Audio, Vidéo et images</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4 form-row" action="detail.php" method="GET">                                   
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input type="text" placeholder="Que cherchez vous ?" class="btn-group1">
                                        <select class="btn-group1" name="type" placeholder="Type" value="Type">
                                            <option selected>Type de fichier...</option>
                                            <option value="musique" >Musique</option>
                                            <option value="video" >Vidéos</option>
                                            <option value="image">Images</option>
                                        </select> 
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span> Chercher<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form> 
                                <div class="slider-link">
                                    <a href="detail.php?rank=last">Derniers ajouts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->
    <!--============================= FIND PLACES =============================-->
    <section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Recherche par catégorie</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="detail.php?type=musique"><figure class="effect-ruby">
                                <img src="images/music.jpg" class="img-fluid" alt="img13" />
                                <figcaption>
                                    <h5>Musique</h5>
                                </figcaption>
                            </figure></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                        <a href="detail.php?type=image"><figure class="effect-ruby">
                                <img src="images/image.jpg" class="img-fluid" alt="img13" />
                                <figcaption>
                                    <h5>Images</h5>
                                </figcaption>
                            </figure></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                        <a href="detail.php?type=video"><figure class="effect-ruby">
                                <img src="images/video.jpg" class="img-fluid" alt="img13" />
                                <figcaption>
                                    <h5>Videos</h5>
                                </figcaption></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END FIND PLACES -->
    
    
    <!--============================= ADD LISTING =============================-->
    <section class="main-block light-bg">
        <div class="container">

            
            <?php 
            //Vérification de session ouverte
            if (isset($_SESSION["login"])){
                printf('<div class="row">    
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Vous etes connecté en tant que %s</h2>
                        <p>Ajoutez des documents à la base</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="ajouterFichier.php" class="btn btn-danger"><span class="ti-plus"></span>Ajouter</a>
                    </div>
                </div>
            </div>', $_SESSION['login']);                               
            } else {
                printf('<div class="row">    
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Espace membres</h2>
                        <p>Vous devez être connecté pour ajouter des fichiers</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="login.php" class="btn btn-danger"><span class="ti-plus"></span> se connecter</a>
                    </div>
                </div>
            </div>');                    
            }                       
            ?>  





        </div>
    </section>
    <!--//END ADD LISTING -->
    <!--============================= FOOTER =============================-->
    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        
                        <p>Copyright &copy; 2019 LDNR's students </p>
                       
                        
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

