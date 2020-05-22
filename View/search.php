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
     include('Util/reserver.php');
    var_dump($_SESSION["id"]);
    $hotel = $model->get_hotel_by_localisation($_POST["localisation"]);

    if (empty($hotel))  echo"<script>alert('Nous n'avons malheureusement pas d'Hôtel ici')</script>";
    else {
      $hotel_id = $hotel[0]['hotel_id'];

    $hotel_info = $model->get_hotel_by_id($hotel_id);}
  }

  $content = "";
  if (!empty($hotel_info))  $content = "Sophie Tells de ".$hotel_info[0]["hotel_localisation_city"];
  require("modules/header.php");

  echo "
  <div class=\"home\">
    <div class=\"background_image\" style=\"background-image:url(Content/images/blog_1.jpg)\"></div>
    <div class=\"home_container\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col\">
            <div class=\"home_content text-center\">
              <div class=\"home_title\">".$content."</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  ";

    echo '<div class="container searching_container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Filtres</h1>
          <div class="list-group">
            <a href="" class="list-group-item">Category 1</a>
            <a href="" class="list-group-item">Category 2</a>
            <a href="" class="list-group-item">Category 3</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">';

              $check_in = date('Y-m-d H:i:s' ,strtotime($_POST["check_in"]));
              $check_out = date('Y-m-d H:i:s' ,strtotime($_POST["check_out"]));
              $room_type = $model->get_all_room_type();
              $last_type = 0;

              foreach ($room_type as $type) {
                $rooms = $model->get_room_by_hotel_id_and_type($hotel_id, $type['room_type_id']);
                $number_of_room_free = 0;

                foreach ($rooms as $r) {
                  $booking_of_room = $model->get_all_booking_by_room_id($r["room_id"], $check_in, $check_out);

                  if (empty($booking_of_room)) array_push($id_of_room_free, $r["room_id"]);
                }

                $path_illustration = "Content/images/illustration_chambre/".$type["room_type_id"].".jpg";
                if (!empty($id_of_room_free)) {
                  echo '<form  method="post">
                          <input type="hidden" name="id_room" value="'.$id_of_room_free[0].'">
                          <input type="hidden" name="check_in" value="'.$_POST["check_in"].'">
                          <input type="hidden" name="check_out" value="'.$_POST["check_out"].'">
                          <input type="hidden" name="id_user" value="'.$_SESSION["id"].'">
                  ';
                }
                echo '
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card bg-dark h-100">
                    <img class="card-img-top" src="'.$path_illustration.'">
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="#">'.$type["room_type"].'</a>
                      </h4>
                      <h5>$'.$type["price"].'</h5>
                      <p class="card-text">'.sizeof($id_of_room_free).' chambre(s) libre(s).</p>';
                      if (!empty($id_of_room_free)) {
                        echo '<input type="submit" class="btn btn-primary pull-right" value="Réserver">';
                      }
                    echo '</div>
                  </div>
                </div>
                ';
                if (!empty($id_of_room_free)) {
                  echo '</form>';
                }
              }

             ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


  <?php require("modules/footer.php") ?>

  </div>

  <script src="Content/js/jquery-3.3.1.min.js"></script>
  <script src="styles/bootstrap-4.1.2/popper.js"></script>
  <script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
  <script src="Content/js/header.js"></script>
  </body>
  </html>
