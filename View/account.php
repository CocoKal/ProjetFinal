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
                    <div class="col-md-6">
                        <div class="profile-head">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vos informations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vos Réservations</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <?php
                      if ($model->check_if_admin($_SESSION["id"])) {
                        echo '<a href="index.php?view=dashboard"><input type="submit" class="profile-edit-btn" name="dash" value="Dashboard"/></a>';
                      }
                      ?>
                        <a href="index.php?view=account_gestion"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/></a>
                        <a href="index.php?log=no"><input type="submit" class="log-out-btn" name="deco" value="Se déconnecter"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Servira pour les gérants d\'hotels qui verront ici la liste de leurs hôtels
                            Peut être

                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> -->
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php $user = $model->get_user_by_id($_SESSION['id']);
                                                                echo $user[0]["lastname"]; ?> </p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Prénom</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <?php $user = $model->get_user_by_id($_SESSION['id']);
                                                    echo $user[0]["firstname"]; ?> </p>
                                    </div>
                                </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php $user = $model->get_user_by_id($_SESSION['id']);
                                                            echo $user[0]["email"]; ?> </p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                              <div class="row">
                                  <div class="col-md-2">
                                      <label>Ville</label>
                                  </div>
                                  <div class="col-md-1">
                                      <label>Num.</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Date arrivée</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Date départ</label>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Paiement</label>
                                  </div>
                              </div>

                              <?php
                                $booking = $model->get_all_booking_by_id_user($user[0]["id"]);

                                foreach ($booking as $book) {
                                  $room = $model->get_room_by_id($book["room_id"]);
                                  $hotel = $model->get_hotel_by_id($room[0]["hotel_id"]);

                                  echo '
                                  <div class="row">
                                      <div class="col-md-2">
                                          <label>'.$hotel[0]["hotel_localisation_city"].'</label>
                                      </div>
                                      <div class="col-md-1">
                                          <label>'.$room[0]["room_no"].'</label>
                                      </div>
                                      <div class="col-md-3">
                                          <label>'.$book["check_in"].'</label>
                                      </div>
                                      <div class="col-md-3">
                                          <label>'.$book["check_out"].'</label>
                                      </div>';
                                      if (!$book["payment_status"]) {
                                        echo ' <div class="col-md-3">
                                            <a href=""><label>En attente</label></a>
                                        </div> ';
                                      }
                                      else {
                                        echo '<div class="col-md-3">
                                            <label>Payé</label>
                                        </div>';
                                      }

                                  echo '</div>';
                                }


                              ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

          <?php require("modules/footer.php"); ?>

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
