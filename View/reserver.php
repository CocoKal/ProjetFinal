<?php
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

  $array = array(
    "room_id" => $_POST["room_id"],
    "check_in" => $_POST["check_in"],
    "check_out" => $_POST["check_out"]);
  $panier = [];
  if (!empty($_SESSION["panier"])) array_push($panier, $_SESSION["panier"]);
  array_push($panier, $array);

  $_SESSION["panier"] = $panier;
  echo"<script>alert('Votre réservation a été enregistré.')</script>";
  header('Refresh: 1; url=index.php');
}
?>
