<?php
require_once ("Model/Model.php"); // chargement du modèle
$model = new model();

//appel au modèle pour gerer la BD
require ('View/account_gestion.php');
?>
