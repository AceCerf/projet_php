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
