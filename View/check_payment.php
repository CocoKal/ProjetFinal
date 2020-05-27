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
    <h4>Votre paiement est enregistré.</h4>
    <img src="Content\images\loader1.gif" class="loader_gif">
  </div>


</body>
</html>

<?php

  //Vérifiquation de la présence de toutes les variables

  if (isset($_POST["amount_services"])
  and isset($_POST["amount_room"])
  and isset($_POST["name_card"])
  and isset($_POST["number_card"])
  and isset($_POST["month"])
  and isset($_POST["year"])
  and isset($_POST["cvv"])) {

    //Partie Payment//
    $date_card = $_POST["month"].$_POST["year"];
    $model->add_payment($_COOKIE["id"], $_POST["name_card"], $_POST["number_card"], $date_card, $_POST["amount_room"], $_POST["amount_services"], $_POST["cvv"]);

    //Partie Booking//

      //Déterminer l'id_payment
    $list_payment = $model->get_payment_of_user($_COOKIE["id"]);

    $id_payment = 0;
    $timestamp_payment = new DateTime("1970-01-01");

    foreach ($list_payment as $payment) {
      $time = new DateTime($payment["payment_date"]);
      $interval = $timestamp_payment->diff($time);
      $interval = $interval->format('%R%a');
      if ($interval >= 0 ) {
        $id_payment = $payment["id_payment"];
      }
    }

    //Ajouter les bookings pour chaque article dans le panier.
    $nb_articles = count($_SESSION['panier']['id']);
    for($i = 0; $i < $nb_articles; $i++) {

      $check_in = date('Y-m-d G:i:s' ,strtotime($_SESSION['panier']['check_in'][$i]));
      $check_out = date('Y-m-d G:i:s' ,strtotime($_SESSION['panier']['check_out'][$i]));
      $room_id = $_SESSION['panier']['id'][$i];

      $model->add_booking($_COOKIE["id"],$room_id,$check_in,$check_out,$id_payment);
    }

    //Remise à zéro du panier
    unset($_SESSION["panier"]);
    //Redirection vers l'acceuil
    header('Refresh: 1; url=index.php');

  }
  else {
    //Retourner sur la page d'acceuil en cas de non présence d'un variable.

    echo "<script>alert('Une erreur est survenue.')</script>";
    header('Refresh: 1; url=index.php');
  }












?>
