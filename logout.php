<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["loggedin_time"]);

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');

$url = "index.php";

header("Location:$url");