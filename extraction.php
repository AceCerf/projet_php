<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_php;charset=utf8', 'root', '1234512345');
}
catch (Exception $e) {
    die('Erreur : ' . $e->message());
}

$reponse = $bdd->query('SELECT * FROM datas');
while ($donnees = $reponse->fetch()) {
    var_dump($donnees);
};






