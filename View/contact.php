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
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<?php require("modules/header.php"); ?>

	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(Content/images/contact.jpg)"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Contact</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Content -->
						<div class="col-md-4" style="padding-top: 90px;">
						<div class="contact_title"><h2>Get in touch</h2></div>
						<div class="contact_list">
							<div class="row social_medias">
								<div class="col">
									<a href="https://www.facebook.com/SofitelFrance/"><img src="Content\images\social_medias\facebook.png"></a>
								</div>
								<div class="col">
									<a href="https://www.instagram.com/sofitel"><img src="Content\images\social_medias\instagram.png"></a>
								</div>
								<div class="col">
									<a href="https://twitter.com/sofitelnews"><img src="Content\images\social_medias\twitter.png"></a>
								</div>
								<div class="col">
									<a href="https://www.youtube.com/channel/UCGOV5vGjasbF8WvPfeep_Zg"><img src="Content\images\social_medias\youtube.png"></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="contact_form_container">
							<form action="#" class="contact_form" id="contact_form">
								<div class="row">
									<div class="col-md-6 input_container">
										<input type="text" class="contact_input" placeholder="Votre nom..." required="required">
									</div>
									<div class="col-md-6 input_container">
										<input type="email" class="contact_input" placeholder="Votre addresse mail..." required="required">
									</div>
								</div>
								<div class="input_container"><input type="text" class="contact_input" placeholder="Sujet..."></div>
								<div class="input_container"><textarea class="contact_input contact_textarea" placeholder="Message..." required="required"></textarea></div>
								<button class="contact_button">Envoyer</button>
							</form>
						</div>
					</div>
				</div>

<!-- Footer -->

<?php require("modules/footer.php") ?>

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
<script src="Content/js/header.js"></script>
</body>
</html>
