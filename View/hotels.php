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
<link rel="stylesheet" type="text/css" href="styles/hotels.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<?php require("modules/header.php"); ?>

	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(Content/images/testimonials.jpg)"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Nos Hôtels</div>
							<div class="booking_form_container">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


  <div class="container">
      <?php

      $list_hotel = $model->get_all_hotels();

      foreach ($list_hotel as $hotel) {

        $city = $hotel["hotel_localisation_city"];
        $path_illustration = str_replace(" ", "_", $city);
        $id = $hotel["hotel_id"];

          echo '<div class="row row_hotel">
              <div class="offset-1 col-10 mt-3">
                  <div class="card bg-dark">
                      <div class="card-horizontal">
                          <div class="img-square-wrapper">
                              <img class="" src="Content/images/illustration_hotel/'.$path_illustration.'_1" style="width: 450px;" alt="Card image cap">
                          </div>
                          <div class="card-body">
                            <h4 class="card-title card_title hotel_title">Sophie Tells de '.$city.' </h4>
                              <a href="index.php?view=hotel_info&hotel_id='.$id.'" class="btn btn-primary pull-right">voir les chambres</p></a>
                          </div>
                      </div>

                  </div>
              </div>
          </div>';
      }


?>
  </div>



  <!-- Footer -->

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
