<?php
require('connexion.php');

$reponse = $bdd->query('SELECT id, chemin_relatif, mime_type, description  FROM datas ORDER BY id DESC LIMIT 10');
    $screen= [];
    $screen[] = "<ul>";
    while ($donnees = $reponse->fetch()){
    $tab = explode( '/', $donnees['chemin_relatif']);
    $nom = end($tab);
    $tab2 = explode('/', $donnees['mime_type']);
    $type = current($tab2);
    $type = ucfirst($type);
    $screen[] = "<li>" . $type ." : <a href='lecturelien.php'>" . $nom ."</a> <pre> Descriptif : ".$donnees['description']."</pre></li>";
}
$screen[] = "</ul>";

foreach ($screen as $lign) {
    echo $lign;
}

