<?php

  $isLogged = isset($_SESSION["id"]);
  $hotel_id;
  $bool = false;

  if (isset($_POST["localisation"])
  and !empty($_POST["localisation"])
  and isset($_POST["check_in"])
  and !empty($_POST["check_in"])
  and isset($_POST["check_out"])
  and !empty($_POST["check_out"])
  and isset($_POST["number"])
  and !empty($_POST["number"])) {

    //Cette methode ne fonctionne pas si il y a deux hôtels dans la même ville. à améliorer.

    if ($_POST["number"] < 1) echo"<script>alert('Le champ number doit être positif.')</script>";
    else {
      $hotel = $model->get_hotel_by_localisation($_POST["localisation"]);

      if (empty($hotel))  echo"<script>alert('Nous n'avons malheureusement pas d'Hôtel ici')</script>";
      else {
        $hotel_id = $hotel[0]['hotel_id'];
        $bool = true;
      }
    }
  }

  if ($bool) {
    header("Location: index.php?view=search&id_hotel=$hotel_id");
  }
?>
