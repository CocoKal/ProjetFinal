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
			$c = 0;

      foreach ($list_hotel as $hotel) {
				$c++;
        $city = $hotel["hotel_localisation_city"];
        $path_illustration = str_replace(" ", "_", $city);
        $id = $hotel["hotel_id"];

          echo '<div class="row">
								<div class="col-6 text-center hotel_list">';
								if ($c % 2 == 0) {
									echo '<div class="img-square-wrapper">
													<a href="index.php?view=hotel_info&hotel_id='.$id.'">
													<img class="" src="Content/images/illustration_hotel/'.$path_illustration.'_1" style="width: 100%;">
													</a>
									</div>';
								}
								else {
									echo '		<a href="index.php?view=hotel_info&hotel_id='.$id.'">
														<h2 class="hotel_list_title">Sophie Tells de '.$city.' </h2>
														<img src="Content/images/icone/geo.png" style="height: 20px;width: 20px;">
														<p>'.$city.', '.$hotel["hotel_localisation_country"].'</p>
														<img class="pull-left quote_left" src="Content/images/icone/quote_1.png">
														<p class="font-italic hotel_list_quote">'.$hotel["quote"].'</p>
														<img class="pull-right quote_right" src="Content/images/icone/quote_2.png">
														</a>';
								}
					echo	'</div>
								<div class="col-6 text-center hotel_list">';
								if ($c % 2 == 0) {
									echo '		<a href="index.php?view=hotel_info&hotel_id='.$id.'">
														<h2 class="hotel_list_title">Sophie Tells de '.$city.' </h2>
														<img src="Content/images/icone/geo.png" style="height: 20px;width: 20px;">
														<p>'.$city.', '.$hotel["hotel_localisation_country"].'</p>
														<img class="pull-left quote_left" src="Content/images/icone/quote_1.png">
														<p class="font-italic hotel_list_quote">'.$hotel["quote"].'</p>
														<img class="pull-right quote_right" src="Content/images/icone/quote_2.png">
														</a>';
								}
								else {
									echo '<div class="img-square-wrapper">
									<a href="index.php?view=hotel_info&hotel_id='.$id.'">
									<img class="" src="Content/images/illustration_hotel/'.$path_illustration.'_1" style="width: 100%;">
									</a>
									</div>';
								}

					echo	'</div>
							</div>
							<hr class="list_separator">';
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
