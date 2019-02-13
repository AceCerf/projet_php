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

    public function submit() {
        echo "<button type='submit'>Envoyer</button>";
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
        echo $form->submit();

       
    ?>    
    </form>
*/
