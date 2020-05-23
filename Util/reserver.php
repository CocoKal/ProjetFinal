<?php
if (!(!isset($_POST["check_in"])
and empty($_POST["check_in"])
and !isset($_POST["check_out"])
and empty($_POST["check_out"])
and !isset($_POST["room_id"])
and empty($_POST["room_id"]))) {

  echo "<script>alert('Une erreur est survenue.')</script>";
  header('Refresh: 1; url=../index.php');
}
else if (empty($_POST["id_user"])) {
  echo"<script>alert('Vous n'êtes pas connecté.')</script>";
  header('Refresh: 1; url=../index.php?view=login');
}
else {
  $model->add_booking($_POST["id_user"],$_POST["room_id"],$_POST["check_in"],$_POST["check_out"]);
  echo"<script>alert('Votre réservation a été enregistré.')</script>";
  header('Refresh: 1; url=../index.php');
}
?>
