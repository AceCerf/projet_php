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
//test
$reponse = $bdd->query('SELECT * FROM `datas` WHERE 1');
while ($donnees = $reponse->fetch()){
echo $donnees['id']." : ".$donnees['chemin_relatif']." : ".$donnees['description']."<br/>";
}
$reponse->closeCursor();
//test affivchage image
$imageTest =$bdd->query("SELECT `chemin_relatif` FROM `datas` WHERE `mime_type`='image/jpeg'");
while ($donnees = $imageTest->fetch()) {
    echo "<img src=\".".$donnees['chemin_relatif']."\">";
}
$imageTest->closeCursor();
$soundTest =$bdd->query("SELECT `chemin_relatif` FROM `datas` WHERE `mime_type`='audio/ogg'");
while ($donnees = $soundTest->fetch()) {
    echo "<br/><br/>";
    echo"<audio controls>\n";
    echo "<source src=\".".$donnees['chemin_relatif']."\"type=\"audio/ogg\">";
    echo "</audio>\n";
}
$soundTest->closeCursor();
$videoTest=$bdd->query("SELECT `chemin_relatif` FROM `datas` WHERE `mime_type`='video/webm'");
while ($donnees = $videoTest->fetch()) {
    echo '<video width="320" height="240" controls>';
    echo "<source src=\".".$donnees['chemin_relatif']."\"type=\"video/webm\">";
    echo "</video>";
}
    $videoTest->closeCursor(); 