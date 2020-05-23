<?php
require_once ("Model/Model.php"); // chargement du modèle
$model = new model();
$user = $model->get_user_by_id($_COOKIE["id"]);
//appel au modèle pour gerer la BD
require ('View/account.php');
?>
