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
  if (!isset($_GET["id_hotel"])) {
    echo"<script>alert('Une erreur est survenue.')</script>";
  	header('Refresh: 1; url=index.php');
  }
  else {
    $hotel_info = $model->get_hotel_by_id($_GET["id_hotel"]);
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
   ?>


  <!-- Page Content -->
    <div class="container searching_container">

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

          <div class="row">

            <?php
              $rooms = $model->get_room_by_hotel_id($_GET['id_hotel']);
              $room_type = $model->get_all_room_type();
              $last_type = 0;
              foreach ($rooms as $r) {

                if ($last_type != $r["room_type_id"]) {
                  $last_type =  $r["room_type_id"];
                  echo '
                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">'.$room_type[$last_type-1]["room_type"].'</a>
                        </h4>
                        <h5>$'.$room_type[$last_type-1]["price"].'</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                      </div>
                    </div>
                  </div>
                  ';
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
