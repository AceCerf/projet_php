<?php
/**
 * Class FormRecherche -> créer un formulaire de recherche à 3 type d'entrées pour la recherche de fichier multimédia
 
 */
class GenerateForm {

    private $data;
    private $type = ['Image', 'Audio', 'Vidéo'];

    public function __construct($data = array()) {
        $this->data = $data;
    }

    private function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : null ; 
    }

    
    public function label($name, $className) {
        printf ("<label class='%s'> %s </label>", $className, $name) ;
    }
    
    public function inputText($name, $className) {
        printf ("<input class='%s' type='text' placeholder='%s' name='%s' value='%s'>", $className, $name, $name, $this->getValue($name)) ;
    }

    public function inputPass($className) {
        printf ("<input class='%s' type='password' name='password' value=''>", $className) ;    
    }

    public function inputTextArea($name, $className) {
        printf ("<textarea cols='40' rows='1' name='%s' value='%s'></textarea>", $className, $name, $this->getValue($name)) ;    
    }

    public function select($type) {
        echo "<select name='type' placeholder='Type' value='Type'>\n<option selected=''>Type de fichier...</option>\n";
        foreach($this->type as $typ) {
            printf ("<option value='%s' name='%s'> %s </option>\n", $typ, $typ, $typ) ;
        };
        echo "</select>\n";
    }

/**
 * Formulaire de type envoie de fichier
 * Indiquer quel type de fichier qe l'on veut à la place de $typeUpload
 * types d'images: img/png, img/jpeg, img/gif, img/svg
 * types de video: video/webm
 * types de son: audio/ogg
 * 
 * ou autre
 */
    public function inputFile($typeUpload, $className = "form-control-file") {
        printf ("<input type='file' name='file' class='%s' id='formEnvoiFichier' accept='%s'>\n", $className, $typeUpload) ;
    }

/**
 * Formulaire de type radio
 * $nameRadio : le nom du formulaire pour les boutons radio
 * $value : nom de la value
 */

    public function radio($nameRadio, $value, $className = "form-check-input" ){
        printf ("<input class='%s' type='radio' name='%s' value='%s'>\n
        <label class='form-check-label for='%s'>%s</label>\n", $className, $nameRadio, $value, $value, $value) ;
    }

/**
 * Bouton submit
 */
    public function submit($className = "btn-form", $spanClassName = "icon-magnifier search-icon") {
        printf ("<button class='%s' type='submit' name='Envoyer'><span class='%s'></span> Chercher<i class='pe-7s-angle-right'></i></button>", $className, $spanClassName);
    }
    
}



/*
//Test ---------------------------------------------

$form = new GenerateForm();
?>

<form action="" method="GET">
    <?php
        echo $form->inputText('Auteur');
        echo $form->select('Type');
        echo $form->inputPass();
        echo $form->inputTextArea('Description');
        echo $form->inputFile('img/png, img/jpeg, img/gif, img/svg');
        echo $form->radio('test', '1er');
        echo $form->radio('test', '2eme');
        echo $form->radio('test', '3eme');
        echo $form->submit();

       
    ?>    
    </form>
*/
   
