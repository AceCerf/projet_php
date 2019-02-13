<?php
session_start();
require('autoload.php');
//$_SESSION['login'] = "Bob";
?>

<html lang="en">

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
                                            <a class="nav-link" href="#">Ajouter</a>
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
    <div class="light-bg"></div>
    
    <!--============================= TITRE DU FICHIER =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-offset2">
                    <h5>TITRE A INSERER</h5>
                </div>
                
            </div>
        </div>
    </section>
    <!--//END  -->
    <div class="reserve-block light-bg"></div>
    <!--============================= DOCUMENT DETAILS =============================-->
    <section class="light-bg ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                            <h4>Description</h4>
                            <p>description Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem id consectetur, voluptas eaque numquam illo sunt doloribus ex cumque officiis deserunt consequatur temporibus molestiae perspiciatis repellendus eum odit sed distinctio?</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae quisquam similique nihil veritatis ex, quas odio quasi doloremque molestiae quia nulla voluptatibus quod tempora, odit, quae ipsam qui necessitatibus alias!</p>
                            <hr>
                        </div>
                        
                    </div>
                    
                </div>

                <div class="col-md-6 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                            IMAGE ou video ou lecteur audio
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </section>
    <!--//END BOOKING DETAILS -->
    <!--============================= ADD LISTING =============================-->
    <div class="reserve-block light-bg"></div>
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
