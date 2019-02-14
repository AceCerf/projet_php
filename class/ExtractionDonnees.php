<?php
 class Extraction {
   private $table;
   private $find_fic=array();// attribut pour la sélection 
   

	public function __construct ($find_fic,$table) //constructeur
   {
     $this->table = $table;
     $this->find_fic=$find_fic;

   }
 
  public function postReqSelect($find_fic,$fields) 
  {
  
 // $fields doit être un array
   $fields = implode(',', $fields);//les différents champs qu'on veut récuperer
   $sql = $bdd->prepare("SELECT $fields FROM $this->table WHERE nom_fic= ?")
   $sql = $bdd-> execute(array($_POST['$find_fic']))

 
 
   // Traitement des données de la requête

   $tab=array();ok

   while ($donnee =$sql->fetch()) 
   {
      $tab[] = $donnee['ID_fic'];
   }
  return $tab; // Renvoie le tableau associatif avec les données
 }
}
?>