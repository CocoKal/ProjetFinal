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

<?php
	if (!isset($_GET["hotel_id"])) {

    echo"<script>alert('Une erreur est survenue.')</script>";
  	header('Refresh: 1; url=index.php?view=hotels');
  }
		echo '<div class="super_container">';
 		require("modules/header.php");
		$hotel = $model->get_hotel_by_id($_GET["hotel_id"]);
		$background_style = "background-image:url(Content/images/illustration_hotel/".$hotel[0]["hotel_localisation_city"]."_1.jpg)";

?>

	<div class="home">
		<div class="background_image" style=<?php echo $background_style; ?>></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Sophie Tells de <?php echo $hotel[0]["hotel_localisation_city"]; ?> </div>
							<div class="booking_form_container">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php require("modules/room_type.php");
				require("modules/services.php"); ?>



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
