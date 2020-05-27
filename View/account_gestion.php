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
</head>
<body>


  <?php require("modules/header.php"); ?>

  <div class="home" style="height: 220px;">
		<div class="background_image" style="background-image:url(Content/images/special.jpg)"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Votre Compte</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <div class="container emp-profile bg-dark">
                <div class="row">
                  <div class="col-md-4">
                      <div class="profile-img">
                          <img src="Content/images/pdp_default.png" alt=""/>
                          <div class="file btn btn-lg btn-primary">
                              Changer de Photo
                              <input type="file" name="file"/>
                          </div>
                      </div>
                  </div>
                    <div class="col-md-8">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Lastname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="lastname" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Firstname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="firstname" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" name="email" placeholder="" required="required">
                                            </div>
                                        </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <input type="submit" id="submit_btn" name="confirmation_button" value="Confirmer" placeholder="" required="required">
                                      </div>
                                  </div>
                                      </form>
                            </div>
                    </div>
                </div>
        </div>
  <?php

  if(isset($_POST['confirmation_button'])) {
      if (!empty($_POST['lastname']) and  !empty($_POST['firstname']) and  !empty($_POST['email'])){
          $ajout = $model->modify_user($_SESSION['id'], $_POST['lastname'], $_POST['firstname'], $_POST['email']);
          header("Location:index.php");
      }
  }
  ?>

          <?php require("modules/footer.php"); ?>

  <?php
  include('Util/account_gestion.php');
  ?>

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
</body>
</html>
