<?php
/**
 * Connexion à la base de donnée mysql
 * dbname : projet_php
 * user : root
 * password : 1234512345
 */
try {
$bdd = new PDO('mysql:host=localhost;dbname=projet_php;charset=utf8', 'root','1234512345');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}


/** 
*test
*
*$reponse = $bdd->query('SELECT * FROM `datas` WHERE 1');
*
*while ($donnees = $reponse->fetch()){
*echo $donnees['id']." : ".$donnees['chemin_relatif']." : ".$donnees['description']."<br/>";
*}
*
*$reponse->closeCursor();
*/
