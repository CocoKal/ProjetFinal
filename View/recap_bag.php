<!DOCTYPE html>
<html lang="en">
<head>
<title>Sophie Tells</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="The River template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/about.css">
<link rel="stylesheet" type="text/css" href="styles/recap_bag.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<?php require("modules/header.php");

	if (isset($_POST["room_id"])) {
		$ref_article = $_POST["room_id"];
		/* création d'un tableau temporaire de stockage des articles */
    $panier_tmp = array("id_article"=>array(),"id"=>array(),"check_in"=>array(),"check_out"=>array());
    /* Comptage des articles du panier */
    $nb_articles = count($_SESSION['panier']['id']);
    /* Transfert du panier dans le panier temporaire */
    for($i = 0; $i < $nb_articles; $i++)
    {
        /* On transfère tout sauf l'article à supprimer */
        if($_SESSION['panier']['id'][$i] != $ref_article)
        {
            array_push($panier_tmp['id'],$_SESSION['panier']['id'][$i]);
            array_push($panier_tmp['check_in'],$_SESSION['panier']['check_in'][$i]);
            array_push($panier_tmp['check_out'],$_SESSION['panier']['check_out'][$i]);
        }
    }
    /* Le transfert est terminé, on ré-initialise le panier */
    $_SESSION['panier'] = $panier_tmp;
    /* Option : on peut maintenant supprimer notre panier temporaire: */
    unset($panier_tmp);
		unset($_POST["room_id"]);
	}
?>

	<!-- Home -->

	<div class="home" style="height: 300px;">
		<div class="background_image" style="background-image:url(Content/images/about.jpg);"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Votre panier</div>
							<div class="booking_form_container">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <div class="container">
    <div class="row bg-dark row_sommaire">
      <div class="col-9">
        <h2>Sommaire</h2>
      </div>
      <div class="col-3">
        <button class="btn pull-right button_checkout" type="button" name="button">Payer</button>
      </div>
    </div>
    <div class="row">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
      <?php
        if (!empty($_SESSION["panier"])) {

					$nb_articles = count($_SESSION['panier']['id']);
			    for($i = 0; $i < $nb_articles; $i++) {
						$room = $model->get_room_by_id($_SESSION['panier']['id'][$i]);
						$room_type = $model->get_room_type_by_id($room[0]["room_type_id"]);
						$check_in = date('j F Y' ,strtotime($_SESSION['panier']['check_in'][$i]));
						$check_out = date('j F Y' ,strtotime($_SESSION['panier']['check_out'][$i]));

						echo '
						<form method="post" action="index.php?view=recap_bag">
						<input type="hidden" name="room_id" value="'.$_SESSION['panier']['id'][$i].'">
						<tr>
            <td>
              <div class="col-3 pull-left">
                <img src="Content\images\illustration_chambre\\'.$room[0]["room_type_id"].'.jpg" style="height: 130px;">
              </div>
              <div class="col-7 pull-right">
                <h4>'.$room_type[0]["room_type"].'</h4>
                <p>Nombre de lit: '.$room_type[0]["nbr_bed"].'</p>
                <p>Date d\'arrivée: '.$check_in.'</p>
                <p>Date de départ: '.$check_out.'</p>
              </div>
            </td>
            <td>'.$room_type[0]["price"].' €</td>
            <td><button type="submit" class="btn btn-outline-danger">Supprimer</button></td>
						</tr>
						</form>
            ';
			    }

        }


       ?>


  </tbody>
</table>
    </div>

  </div>








<?php require("modules/footer.php") ?>

</div>

<script src="Content/js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/jquery-datepicker/jquery-ui.js"></script>
<script src="Content/js/about.js"></script>
</body>
</html>
