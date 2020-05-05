<?php
require_once ("Model/Model.php"); // chargement du modèle
$model = new model();
if(isset($_COOKIE['id'])){
$admin = $model -> is_admin($_COOKIE['id']);
}
//appel au modèle pour gerer la BD
require ('View/acceuil.php');
?>
