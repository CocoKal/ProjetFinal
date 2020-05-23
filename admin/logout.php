<?php
session_start();
unset($_SESSION["user"]);
header("location: ProjetFinal\View\acceuil.php");
?>