<?php
session_start();
$_SESSION['login'] = "Bastien";
require('class/GenerateForm.php');
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<form action="upload.php" method="POST" enctype='multipart/form-data'>
<p>Formats acceptés : jpg, png, jpeg, svg, gif, ogg, webm<p>

    <?php
    //Formulaire d'envoi des données - envoi en POST dans le fichier ajout.php
        $form = new GenerateForm();
        echo "<input type='hidden' name='MAX_FILE_SIZE' value='20000000'>";
        echo $form->inputFile('img/png, img/jpeg, img/gif, img/svg, audio/ogg, video/web') . "<br>\n";
        echo $form->inputTextArea('Description') . "<br>\n";        
        echo $form->submit() . "<br>\n";       
    ?>    
    </form>
