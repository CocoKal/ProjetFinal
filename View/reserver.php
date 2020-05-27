<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/account.css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="styles/reserver.css">
</head>
<body>

  <div class="container_loader">
    <h4>Votre panier est mis à jour.</h4>
    <img src="Content\images\loader1.gif" class="loader_gif">
  </div>


</body>
</html>

<?php

if (!isset($_COOKIE["id"])) {

  echo"<script>alert('Vous n'êtes pas connecté')</script>";
  header('Refresh: 1; url=index.php?view=login');
}
else {

if ((!isset($_POST["check_in"])
and empty($_POST["check_in"])
and !isset($_POST["check_out"])
and empty($_POST["check_out"])
and !isset($_POST["room_id"])
and empty($_POST["room_id"]))) {

  echo "<script>alert('Une erreur est survenue.')</script>";
  header('Refresh: 1; url=index.php');
}
else {

$service_array = array();
$services = $model->get_all_services();
foreach ($services as $service) {
  $id_check = str_replace(" ", "_", $service['name']);
  if (isset($_POST[$id_check])) {
    array_push($service_array, $service['id_service']);
  }
}

$select = array();
$select['id'] = $_POST["room_id"];
$select['check_in'] = $_POST["check_in"];
$select['check_out'] = $_POST["check_out"];
$select['services_index'] = $service_array;

/* On vérifie l'existence du panier, sinon, on le crée */
if(!isset($_SESSION['panier']))
{
    /* Initialisation du panier */
    $_SESSION['panier'] = array();
    /* Subdivision du panier */
    $_SESSION['panier']['id'] = array();
    $_SESSION['panier']['check_in'] = array();
    $_SESSION['panier']['check_out'] = array();
    $_SESSION['panier']['services'] = array();
}
/* Ici, on sait que le panier existe, donc on ajoute l'article dedans. */
array_push($_SESSION['panier']['id'],$select['id']);
array_push($_SESSION['panier']['check_in'],$select['check_in']);
array_push($_SESSION['panier']['check_out'],$select['check_out']);
array_push($_SESSION['panier']['services'],$select['services_index']);

if (isset($_COOKIE["id"])) {
  header('Refresh: 1; url=index.php?view=recap_bag');
}
else {
  header('Refresh: 1; url=index.php');
}

}
}
?>
