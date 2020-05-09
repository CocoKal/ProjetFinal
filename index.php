<?php
session_start();
require_once ("Controller/routeur.php");
$routeur = new Router();
$routeur -> routeReq();

?>
