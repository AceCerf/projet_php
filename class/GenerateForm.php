<?php
/**
 * Class FormRecherche -> créer un formulaire de recherche à 3 type d'entrées pour la recherche de fichier multimédia
 
 */
class GenerateForm {

    private $data;
    public $surround = 'p';
    private $type = ['Image', 'Audio', 'Vidéo'];

    public function __construct($data = array()) {
        $this->data = $data;
    }

    private function surround($html) {
        return "<{$this->surround}>$html<{$this->surround}>\n";
    }

    private function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    
    public function inputText($name) {
        return $this->surround(
            "<label>". $name . " : </label><input type='text' name='" . $name . "' value='" . $this->getValue($name) . "'>"
        );    
    }

    public function inputPass() {
        return $this->surround(
            "<label>Mot de Passe : </label><input type='password' name='password' value=''>"
        );    
    }

    public function inputTextArea($name) {
        return $this->surround(
            "<label>". $name . " : </label><textarea cols='40' rows='5' name='" . $name . "' value='" . $this->getValue($name) . "'></textarea>"
        );    
    }

    public function select($type) {
        echo "<label> Type : </label><select>\n";
        foreach($this->type as $typ) {
            echo "  <option value='". $typ . "'>" . $typ . "</option>\n";
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
    public function inputFile($typeUpload) {
        return $this->surround(
            "<label>Envoie de fichier :</label><input type='file' class='form-control-file' id='formEnvoieFichier' accept='".$typeUpload."'>\n"
        );

    }

/**
 * Formulaire de type radio
 * $nameRadio : le nom du formulaire pour les boutons radio
 * $value : nom de la value
 */

    public function radio($nameRadio, $value){
        return $this->surround(
        "<input class='form-check-input' type='radio' name='".$nameRadio."' value='".$value."'>\n
        <label class='form-check-label for='".$value."'>$value</label>\n"  
        );

    }

/**
 * Bouton submit
 */
    public function submit() {
        echo "<button type='submit'>Envoyer</button>";
    }
    
}


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
