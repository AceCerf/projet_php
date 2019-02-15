<?php
session_start();
require('autoload.php');
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
    <div class="light-bg"></div>
    
    <!--============================= TITRE DU FICHIER =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-offset2">
                    <h5>Résultats</h5>
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
                            <?php
                            require_once('connexion.php');

                            //a flag who verify the nmber of results
                            $flag = 0;
                            try { 
                                if ( isset($_GET['Mots_Clés']) && $_GET['type'] == 'Type de fichier...' ) {

                                    //Research with only keywords
                                    $stmt = $bdd->prepare('SELECT * FROM datas WHERE chemin_relatif LIKE :mots_cles OR description LIKE :mots_cles');
                                    $stmt->bindValue(':mots_cles', "%{$_GET['Mots_Clés']}%");
                                    if ($stmt->execute() !== false) {
                                        $res = $stmt->fetchAll();

                                        //verify if we get more than one result or not
                                        if (sizeof($res) == 1) {
                                        	    $flag = 1;
	                                            $tab = explode( '/', $res[0]['chemin_relatif']);
				                            	$nom = end($tab);
	                                            echo "<h2>".$nom."</h2>";
	                                            echo "<p>".$res[0]["description"]."</p>";
	                                    } elseif (sizeof($res) > 1) {
                                            echo "<p>Plusieurs résultast trouvés, veuillez choisir : </p>";
	                                    	$flag = 2;
	            							$screen= [];
	                            			$screen[] = "<ul>";
				                            foreach ($res as $donnees){
				                            $tab = explode( '/', $donnees['chemin_relatif']);
				                            $nom = end($tab);
				                            $tab2 = explode('/', $donnees['mime_type']);
				                            $type = current($tab2);
				                            $type = ucfirst($type);
				                            $screen[] = "<li>" . $type ." : <a href='detail.php?Mots+Clés=" .$nom ."&type=" .$type . "'>" . $nom ."</a> <pre style='overflow: hidden; text-overflow: ellipsis'> Descriptif : ".$donnees['description']."</pre></li>";
				                            }
				                            $screen[] = "</ul>";

				                            foreach ($screen as $lign) {
				                                echo $lign;
				                            }
	                                    
                                        } else {
	                                            echo "Aucun résultat trouvé\n";
	                                    }
	                                        
                                    } else {
                                        echo "Aucun résultat trouvé\n";
                                    }

                                    //deconnect
                                    $bdd = null;

                                } elseif ( isset($_GET['Mots_Clés']) && $_GET['type'] != 'Type de fichier...' ) {

                                    //Research with keywords and type
                                    $stmt = $bdd->prepare('SELECT * FROM datas WHERE (chemin_relatif LIKE :mots_cles OR description LIKE :mots_cles) AND UPPER(mime_type) LIKE UPPER(:type)');
                                    $stmt->bindValue(':mots_cles', "%{$_GET['Mots_Clés']}%");
                                    $stmt->bindValue(':type', "{$_GET['type']}%");
                                    if ($stmt->execute() !== false) {
                                        $res = $stmt->fetchAll();

                                        //verify if we get more than one result or not
                                        if (sizeof($res) == 1) {
                                        	    $flag = 1;
                                        	    $tab = explode( '/', $res[0]['chemin_relatif']);
				                            	$nom = end($tab);
	                                            echo "<h2>".$nom."</h2>";
	                                            echo "<p>".$res[0]["description"]."</p>";
	                                    } elseif (sizeof($res) > 1) {
	                                    	$flag = 2;
	            							$screen= [];
	                            			$screen[] = "<ul>";
				                            foreach ($res as $donnees){
				                            $tab = explode( '/', $donnees['chemin_relatif']);
				                            $nom = end($tab);
				                            $tab2 = explode('/', $donnees['mime_type']);
				                            $type = current($tab2);
				                            $type = ucfirst($type);
				                            $screen[] = "<li>" . $type ." : <a href='detail.php?Mots+Clés=" .$nom ."&type=" .$type . "'>" . $nom ."</a> <pre style='overflow: hidden; text-overflow: ellipsis'> Descriptif : ".$donnees['description']."</pre></li>";
				                            }
				                            $screen[] = "</ul>";

				                            foreach ($screen as $lign) {
				                                echo $lign;
				                            }
                                        } else {
                                            echo "Aucun résultat trouvé\n";
                                        }
                                    } else {
                                        echo "Aucun résultat trouvé\n";
                                    }

                                    //deconnect
                                    $bdd = null;

                                }
                            } catch (exception $exep) {
                                printf("<p>Erreur : %s</p>\n", htmlspecialchars($exep->getMessage()));
                            }
                            ?>
                        </div>
                        
                    </div>
                    
                </div>

                <div class="col-md-6 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                            <?php
                                try {
                                    //verify if table obtained and have only one result
                                    if ($flag == 1) {
	                                        //verify the type of content
	                                        if ($res[0]["mime_type"] == "image/png" || $res[0]["mime_type"] == "image/jpeg" || $res[0]["mime_type"] == "image/svg") {
	                                            printf ('<img src="%s" class="img-fluid">', $res[0]["chemin_relatif"]); 
	                                        } elseif ($res[0]["mime_type"] == "audio/ogg") {
	                                            printf ('<audio controls><source src="%s" type="audio/ogg"></audio>', $res[0]["chemin_relatif"]);
	                                        } elseif ($res[0]["mime_type"] == "video/webm") {
	                                            printf ('<video width="320" height="240" controls><source src="%s" type="video/webm"></video>', $res[0]["chemin_relatif"]);
	                                        }
                                    }
                                } catch (exception $exep) {
                                    printf("<p>Erreur : %s</p>\n", htmlspecialchars($exep->getMessage()));
                                }
                            ?>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </section>
    <!--//END BOOKING DETAILS -->
    <div class="reserve-block light-bg"></div>
    <div class="reserve-block light-bg"></div>
                                  
    <div class="row d-flex justify-content-center">
        
            
                <div class="col-md-10">
                    <form class="form-wrap mt-4 form-row" action="detail.php" method="GET">                                   
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php
                            $form = new GenerateForm();
                            $form->inputText('Nouvelle Recherche', 'btn-group1');
                            $form->select('Type', 'btn-group1');
                            $form->submit();
                        ?>
                        </div>
                    </form> 
                    
                </div>
            
        </div>


    <!--============================= ADD LISTING =============================-->
    
    <section class="main-block light-bg">
        <div class="container">

            
            <?php 
            //Vérification de session ouverte
            if (isset($_SESSION["login"])){
                printf('<div class="row">    
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h4>Vous etes connecté en tant que %s</h4>
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
                        <h4>Espace membres</h4>
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
