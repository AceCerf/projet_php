<?php
/**
 * Class FormRecherche -> créer un formulaire de recherche à 3 type d'entrées pour la recherche de fichier multimédia
 */
class FormRecherche {

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
    
    public function input($name) {
        return $this->surround(
            "<label>". $name . " : </label><input type='text' name='" . $name . "' value='" . $this->getValue($name) . "'>"
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

//Test ---------------------------------------------

$form = new FormRecherche();
?>

<form action="" method="GET">
    <?php
        echo $form->input('Auteur');
        echo $form->select('Type');
        echo $form->input('Description');
        echo $form->submit();

       
    ?>    
    </form>

