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
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="styles/search.css">
<link rel="stylesheet" type="text/css" href="styles/search_responsive.css">

</head>
<body>


  <div class="super_container">

    <!--Vérifiquation de la présence des variables POST-->

    <?php
    if (!(isset($_POST["localisation"])
    and !empty($_POST["localisation"])
    and isset($_POST["check_in"])
    and !empty($_POST["check_in"])
    and isset($_POST["check_out"])
    and !empty($_POST["check_out"]))) {

      //En cas de non présence,
      //Afficher une alert
      echo"<script>alert('Une erreur est survenue.')</script>";
      //Rediriger vers l'acceuil
      header('Refresh: 1; url=index.php');
    }
    else {
      //En cas de présence
      //Récupération des variables POST
      $localisation = ucfirst($_POST["localisation"]);
      $check_in = date('j F Y' ,strtotime($_POST["check_in"]));
      $check_out = date('j F Y' ,strtotime($_POST["check_out"]));

      //Récupération de l'hotel en fonction de la variable POST localisation.
      $hotel = $model->get_hotel_by_localisation($_POST["localisation"]);

      //S'il n'y a pas d'hotel, afficher une alert
      if (empty($hotel))  echo"<script>alert('Nous n'avons malheureusement pas d'Hôtel ici')</script>";
      else {
        //Sinon récupérer
        //L'hotel id
        $hotel_id = $hotel[0]['hotel_id'];
        //Les informations de l'hotel grace à son id
        $hotel_info = $model->get_hotel_by_id($hotel_id);
      }
    }

    //Ajout du header
    require("modules/header.php");

?>

  <!--Home-->

  <div class="home" style="height: 350px;">
    <div class="background_image" style="background-image:url(Content/images/blog_1.jpg)"></div>
    <div class="home_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="home_content text-center">
              <div class="home_title">Votre recherche</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Container de recherche -->

  <div class="container search_container">
    <div class="row">
      <div class="col-3">

        <!--Données recherés par l'utilisateur -->

        <div class="card bg-dark">
          <div class="card-head text-center">
            <h4 style="margin-top: 20px;">Votre recherche</h4>
          </div>
          <div class="card-body">
            <p class="pull-left" style="margin-bottom: 10px;">Localisation:</p>
            <p class="pull-right"><?php echo $localisation  ?></p>
            <p class="pull-left" style="margin-bottom: 10px;">Date d'arrivée:</p>
            <p class="pull-right"><?php echo $check_in ?></p>
            <p class="pull-left" style="margin-bottom: 10px;">Date de départ:</p>
            <p class="pull-right"><?php echo $check_out ?></p>
          </div>
        </div>

        <!--Formulaire afin de refaire une recherche -->

        <div class="row search_again">
          <div class="col-12">

            <form action="index.php?view=search" method="post">
              <div class="text-center">
                <h4>Refaire une recherche</h4>
                <div class="">
                  <div><input name="localisation" type="text" class="booking_input booking_input_a booking_in" placeholder="City..." required="required"></div>
                  <div><input name="check_in" type="text" class="datepicker booking_input booking_input_a booking_in" placeholder="Check in" required="required"></div>
                  <div><input name="check_out" type="text" class="datepicker booking_input booking_input_a booking_out" placeholder="Check out" required="required"></div>
                </div>
                <div><button type="submit" class="booking_button trans_200" style="width: 100%;">Refaire une recherche</button></div>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!--Résultats de la recherche -->
      <div class=" col-9">
      <?php
      //Récupération et formatage des informations des dates
      $checkIn = date('Y-m-d H:i:s' ,strtotime($_POST["check_in"]));
      $checkOut = date('Y-m-d H:i:s' ,strtotime($_POST["check_out"]));
      //Récupération des type de chambres
      $room_type = $model->get_all_room_type();
      //Préparation d'une variable tampon afin de stocker le dernier type vu
      $last_type = 0;

      //Récupération de la date actuel
      $current_time = new DateTime("now");
      //Récupération de la date du check_in sous forme de DateTime
      $time = new DateTime($_POST["check_in"]);
      //Calcul de l'interval entre les deux dates
      $interval = date_diff($current_time, $time);
      //Formatage de la variable interval
      $interval = $interval->format('%R%a');
      //Test si la date d'arrivée est au moins superieur de 48h
      $in_time = ($interval >= 2);

      //Affichage du titre avec le nom de l'hotel
      echo '  <div class="row text-center">
                <div class="col-12" style="padding-bottom: 25px;">
                <h2>Sophie Tells de '.$hotel_info[0]["hotel_localisation_city"].'</h2>
                </div>
              </div>';

      //Boucle sur tous les types de chambres
      foreach ($room_type as $type) {

        //Initialisation du tableau qui stockera les id des chambres libres
        $id_of_room_free = array();
        //Récupération des chambres en fonction de l'id de l'hotel et du type actuel
        $rooms = $model->get_room_by_hotel_id_and_type($hotel_id, $type['room_type_id']);

        //Calcul de l'interval entre la date d'arrivée et la date de départ
        //Récupération du check_in sous forme de DateTime
        $datetime1 = new DateTime($_POST["check_in"]);
        //Récupération du check_out sous forme de DateTime
        $datetime2 = new DateTime($_POST["check_out"]);
        //Calcul de la différence entre les deux dates
        $interval = $datetime1->diff($datetime2);
        //Formatage de la variable
        $interval = $interval->format('%R%a');
        //Calcul du prix total en fonction du nombre de nuités
        $price = $type["price"] * $interval;

        //Boucle sur chaque chambre (récupéré ligne 163)
        foreach ($rooms as $r) {
          //Récupération de tous les bookings d'une chambre entre deux dates.
          $booking_of_room = $model->get_all_booking_by_room_id($r["room_id"], $checkIn, $checkOut);

          //Si la chambre n'a pas de booking
          if (empty($booking_of_room)) {
            //Alors ajouter l'id de la chambre dans le tableau (initialisé ligne 161)
            array_push($id_of_room_free, $r["room_id"]);
          }
        }

        //Récupération du chemin de l'image d'illustration de la chambre
        $path_illustration = "Content/images/illustration_chambre/".$type["room_type_id"].".jpg";
        //Si le type de chambre à au moins une chambre de libre
        if (!empty($id_of_room_free)) {
          //Afficher l'entete du formulaire de reservation
          //Mise dans un des input cachés les variable room_id, check_in et check_out
          echo '<form action="index.php?view=reserver" method="post">
                  <input type="hidden" name="room_id" value="'.$id_of_room_free[0].'">
                  <input type="hidden" name="check_in" value="'.$_POST["check_in"].'">
                  <input type="hidden" name="check_out" value="'.$_POST["check_out"].'">
          ';
        }

        /*Affichage de la carte du résultat jusqu'au nombre de chambre libre
        en apssant par le prix par nuité*/
        echo '
          <div class="card bg-dark search_card">
            <div class="row">
              <div class="col-sm-6">
                <img class="d-block w-100 search_img" style ="height: 240px;" src="'.$path_illustration.'">
              </div>
              <div class="col-sm-6">
                <div class="card-block">
                  <h4 class="card-title">
                    <a href="index.php?view=room&room_type='.$type["room_type_id"].'">'.$type["room_type"].'</a>
                  </h4>
                  <h5>'.$price.' € / nuit</h5>
                  <p class="card-text">'.sizeof($id_of_room_free).' chambre(s) libre(s).</p>';

              /*On détermine s'il y a au moins une chambre de libre
              et s'il n'est pas trop tard pour faire une réservation (48h)*/
              if (!empty($id_of_room_free) and $in_time) {
                //Récupération des services d'un hotel.
                $services_by_hotel = $model->get_all_hotel_services_by_hotel_id($hotel_id);
                //Initialisation d'un compteur afin d'avoir un affichage plus "propre"
                $compteur = 0;
                //Initialisation du container des check box des services
                echo '<div class="form-check" style="height: 100px; margin-right: 20px;">
                        <div class="pull-left">';

                //Boucle sur les services d'un hotel
                foreach ($services_by_hotel as $service_of_hotel) {
                  //Incrémentation du compteur
                  $compteur = $compteur + 1;
                  //Récupération des informations sur le service courant
                  $service = $model->get_service_by_id($service_of_hotel['service_id']);
                  //Initialisation de la chaine de caractère qui servira d'id à l'input du service courant
                  $id_check = str_replace(" ", "_", $service[0]['name']);

                  //Exclusion des services de salle de mariage, de conférence et de Casino (pas cohérent)
                  if ($service[0]['id_service'] != 15 && $service[0]['id_service'] != 16 && $service[0]['id_service'] != 10) {
                    //Affichage du service courant sous forme de check box
                  echo '
                    <input class="form-check-input" type="checkbox" value="'.$service[0]['id_service'].'" id="'.$id_check.'" name="'.$id_check.'">
                      <label class="form-check-label" for="'.$id_check.'">
                      '.$service[0]['name'].'
                      </label>
                      <br>
                      ';
                      //Si le compteur arrive à 4 alors passer à la colonne suivante
                      if ($compteur == 4) echo '</div>
                                                <div class="pull-right">';
                }
              }
              /*Si le compteur (ou le nombre de service) passe 8
              alors afficher le bouton submit à gauche de la card */
              if ($compteur > 8) {
                echo '</div>
                  </div>
                <input type="submit" class="btn btn-primary pull-left" value="Ajouter au panier">';
              }
              //Sinon le laisser à droite
              else {
                echo '</div>
                  </div>
                <input type="submit" class="btn btn-primary pull-right" value="Ajouter au panier">';
                }
              }
            echo '</div>
              </div>
            </div>
          </div>';

        //S'il y a au moins une chambre de libre alors fermer le formulaire
        if (!empty($id_of_room_free)) {
          echo '</form>';
        }
      }
?>
          </div>

        </div>

  <!--Ajout du footer -->
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
  <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
  <script src="Content/js/custom.js"></script>
  <script src="Content/js/header.js"></script>
  </body>
  </html>
