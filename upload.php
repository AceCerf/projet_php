<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_php;charset=utf8', 'root', '1234512345');
}
catch (Exception $e) {
    die('Erreur : ' . $e->message());
}

// Récupérer le login dans la session
$auteur = $_SESSION['login'];

//Vérification de l'extension
$legalExtensions = array("jpg", "png", "jpeg", "svg", "gif", "ogg", "webm");
$legalImgExt = array("jpg", "png", "jpeg", "svg", "gif");
$fileTab = explode('.', $_FILES["file"]["name"]);
$fileExt =  end($fileTab);


if (!in_array($fileExt, $legalExtensions)) {
    //echo 'je suis la';
    $_SESSION['message'] = "Format non valide";
    header('location:ajouterFichier.php');
    die();
} 

// Chercher dans la bdd l'id correspondant au login
$req = $bdd->prepare('SELECT id FROM users WHERE nom = ?');
$req -> execute(array($_SESSION['login']));
$id = $req->fetchColumn();

//urls des chemins relatifs 
$img = 'multimedia/images/';
$vid = 'multimedia/videos/';
$son = 'multimedia/audio/';


//Eléments récupérés
$description = htmlspecialchars($_POST['Description']);
$type = $_FILES['file']['type'];
$file = $_FILES['file']['name'];

//Choix du chemin en fonction du type de fichier
$url = null;
if (isset($_FILES)) {
    if (in_array($fileExt, $legalImgExt)) {
        $url = $img; 
    } else if ($fileExt == "ogg") {
        $url = $son;
        $type = 'audio/ogg';
    } else if ($fileExt == "webm") {
        $url = $vid;
        $type = 'video/webm';
    }
}


// Si pas bon fichier
if ($url == null) {
    $_SESSION['message'] = "Veuillez recommencer, une erreur s'est produite !";
    header('location:ajouterFichier.php');
    die();
}

// Préparer la requete d'ajout dans la bdd
$req = $bdd->prepare('INSERT INTO datas(chemin_relatif, mime_type, description, auteur_id, date) VALUES(:chemin, :type, :descr, :aut, :date)');

//Upload dans le dossier

if(isset($_FILES['file']) AND isset($url))
{ 
    $fichier = basename($_FILES['file']['name']);
    //On vérifie la taille du fichier
    // taille maximum (en octets)
    $taille_maxi = 100000000;
    $taille = filesize($_FILES['file']['tmp_name']);
    if($taille>$taille_maxi)
    {
        $_SESSION['message'] = "Fichier trop volumineux";
        header('location:ajouterFichier.php');
    }


    // On vérifie le nom du fichier
    $fichier = strtr($fichier,
    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
    //On remplace les lettres accentutées par les non accentuées dans $fichier.      
    //expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre
    //dans $fichier par un tiret "-" et qui place le résultat dans $fichier.
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);     
    


    if(move_uploaded_file($_FILES['file']['tmp_name'], $url . $fichier)) 
    //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        
         try {
            // Si l'upload a fonctionné on exécute la requete
            /*echo $url.$file;
            echo '<br>';
            echo $type;
            echo '<br>';
            echo $description;
            echo '<br>';
            echo $id;*/
            $req->execute(array(
            'chemin' => $url.$file,
            'type' => $type,
            'descr' => $description,
            'aut' => $id,
            'date' => date('Y-m-d'),
            )); 
            $_SESSION['success'] = "Upload effectué avec succès !";
            header('location:ajouterFichier.php');      
        }
        catch (Exception $e) {
            //echo 'Exception reçue : ',  $e->getMessage(), "\n";
            //die('Erreur : ' . $e->message());
            
            $_SESSION['message'] = "Erreur lors de l'envoi du fichier : " . $e->message();
            header('location:ajouterFichier.php');
            die();
        }
} 

}







