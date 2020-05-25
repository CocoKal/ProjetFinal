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

    <?php
    if (!(isset($_POST["localisation"])
    and !empty($_POST["localisation"])
    and isset($_POST["check_in"])
    and !empty($_POST["check_in"])
    and isset($_POST["check_out"])
    and !empty($_POST["check_out"])
    and isset($_POST["number"])
    and !empty($_POST["number"]))) {

      echo"<script>alert('Une erreur est survenue.')</script>";
      header('Refresh: 1; url=index.php');
    }
    else {
      $localisation = ucfirst($_POST["localisation"]);
      $check_in = date('j F Y' ,strtotime($_POST["check_in"]));
      $check_out = date('j F Y' ,strtotime($_POST["check_out"]));
      $number = $_POST["number"];

      $hotel = $model->get_hotel_by_localisation($_POST["localisation"]);

      if (empty($hotel))  echo"<script>alert('Nous n'avons malheureusement pas d'Hôtel ici')</script>";
      else {
        $hotel_id = $hotel[0]['hotel_id'];
        $hotel_info = $model->get_hotel_by_id($hotel_id);
      }
    }

    ?>
  <?php require("modules/header.php"); ?>

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

  <div class="container search_container">
    <div class="row">
      <div class="col-3">
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
            <p class="pull-left" style="margin-bottom: 10px;">Nombre de personnes:</p>
            <p class="pull-right"><?php echo $number  ?></p>
          </div>

        </div>

        <div class="row search_again">
          <div class="col-12">

            <form action="index.php?view=search" method="post">
              <div class="text-center">
                <h4>Refaire une recherche</h4>
                <div class="">
                  <div><input name="localisation" type="text" class="booking_input booking_input_a booking_in" placeholder="City..." required="required"></div>
                  <div><input name="check_in" type="text" class="datepicker booking_input booking_input_a booking_in" placeholder="Check in" required="required"></div>
                  <div><input name="check_out" type="text" class="datepicker booking_input booking_input_a booking_out" placeholder="Check out" required="required"></div>
                  <div><input name="number" type="number" class="booking_input booking_input_b" placeholder="Number..." required="required"></div>
                </div>
                <div><button type="submit" class="booking_button trans_200" style="width: 100%;">Refaire une recherche</button></div>
              </div>
            </form>

          </div>
        </div>
      </div>

      <div class="offset-1 col-8">
      <?php

      $checkIn = date('Y-m-d H:i:s' ,strtotime($_POST["check_in"]));
      $checkOut = date('Y-m-d H:i:s' ,strtotime($_POST["check_out"]));
      $room_type = $model->get_all_room_type();
      $last_type = 0;


      foreach ($room_type as $type) {
        $id_of_room_free = [];
        $rooms = $model->get_room_by_hotel_id_and_type($hotel_id, $type['room_type_id']);

        $datetime1 = new DateTime($_POST["check_in"]);
        $datetime2 = new DateTime($_POST["check_out"]);
        $interval = $datetime1->diff($datetime2);
        $int_interval = $interval->format('%a');
        $price = $type["price"] * $int_interval;

        foreach ($rooms as $r) {
          $booking_of_room = $model->get_all_booking_by_room_id($r["room_id"], $checkIn, $checkOut);


          if (empty($booking_of_room)) {
            array_push($id_of_room_free, $r["room_id"]);
          }
        }

        $path_illustration = "Content/images/illustration_chambre/".$type["room_type_id"].".jpg";
        if (!empty($id_of_room_free)) {
          echo '<form action="index.php?view=reserver" method="post">
                  <input type="hidden" name="room_id" value="'.$id_of_room_free[0].'">
                  <input type="hidden" name="check_in" value="'.$_POST["check_in"].'">
                  <input type="hidden" name="check_out" value="'.$_POST["check_out"].'">
          ';
        }
        echo '

          <div class="card bg-dark search_card">
            <div class="row">
              <div class="col-sm-5">
                <img class="d-block w-100 search_img" src="'.$path_illustration.'">
              </div>
              <div class="col-sm-7">
                <div class="card-block">
                  <h4 class="card-title">
                    <a href="#">'.$type["room_type"].'</a>
                  </h4>
                  <h5>'.$price.' €</h5>
                  <p class="card-text">'.sizeof($id_of_room_free).' chambre(s) libre(s).</p>';
              if (!empty($id_of_room_free)) {
                echo '<input type="submit" class="btn btn-primary pull-right" value="Réserver">';
              }
            echo '</div>
              </div>
            </div>
          </div>

        ';
        if (!empty($id_of_room_free)) {
          echo '</form>';
        }
      }



     ?>

          </div>
        </div>
      <h3>Services :</h3>
      <?

      $req="SELECT * from service as s , hotel_service as h where (s.id_service=h.service_id) and (h.hotel_id=$hotel_id)";
      $repp=mysqli_query($req);
      $i=0;
      while($hrow=mysqli_fetch_array($req)){
          echo"
												<input value=".$hrow['name']."</input>";
												

        }


      ?>


      </div>
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
  <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
  <script src="Content/js/custom.js"></script>
  <script src="Content/js/header.js"></script>
  </body>
  </html>
