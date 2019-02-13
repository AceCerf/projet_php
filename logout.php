<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["loggedin_time"]);

$url = "bindex.php";

header("Location:$url");