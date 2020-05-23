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

  <?php
    if (!isset($_COOKIE["id"])) {

      echo"<script>alert('Une erreur est survenue.')</script>";
      header('Refresh: 1; url=index.php');
    }
      echo '<div class="super_container">';
      require("modules/header.php");

      $staff = $model->get_staff_by_id_user($_COOKIE["id"]);
      $is_manager;
      if (!empty($staff)) {
        if ($staff[0]["staff_type_id"] == 1) {
          $is_manager = true;
        }
      }
      else $is_manager = false;

  ?>


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
                                <?php
                                  if ($is_manager) {
                                      echo '<li class="nav-item">
                                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Vos Hôtels</a>
                                          </li>';
                                  }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <?php
                      if ($model->check_if_admin($_COOKIE["id"])) {
                        echo '<a href="index.php?view=dashboard"><input type="submit" class="profile-edit-btn" name="dash" value="Dashboard"/></a>';
                      }
                      ?>
                        <a href="index.php?view=account_gestion"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/></a>
                        <a href="index.php?log=no"><input type="submit" class="log-out-btn" name="deco" value="Se déconnecter"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-4 col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                        </div>
                                          <table class="table">
                                            <tbody>
                                              <tr>
                                                <th scope="row">Nom</th>
                                                <td><?php $user = $model->get_user_by_id($_COOKIE['id']);
                                                                echo $user[0]["lastname"]; ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Prénom</th>
                                                <td><?php $user = $model->get_user_by_id($_COOKIE['id']);
                                                            echo $user[0]["firstname"]; ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Email</th>
                                                <td><?php $user = $model->get_user_by_id($_COOKIE['id']);
                                                            echo $user[0]["email"]; ?></td>
                                              </tr>
                                            </tbody>
                                          </table>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">
                              <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Ville</th>
                                    <th scope="col">N°</th>
                                    <th scope="col">Date arrivée</th>
                                    <th scope="col">Date départ</th>
                                    <th scope="col">Paiement</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $booking = $model->get_all_booking_by_id_user($user[0]["id"]);

                                    foreach ($booking as $book) {
                                      $room = $model->get_room_by_id($book["room_id"]);
                                      $hotel = $model->get_hotel_by_id($room[0]["hotel_id"]);
                                      $payment_status = ($book["payment_status"]) ? "Payé"
                                      : '<button type="button" class="btn btn-primary" style="width: 90px; height:50px;">
                                          <img src="Content\images\icone\credit-card.png" style="height: 20px;">
                                         </button>';

                                      echo '<tr>
                                              <td>'.$hotel[0]["hotel_localisation_city"].'</td>
                                              <td>'.$room[0]["room_no"].'</td>
                                              <td>'.$book["check_in"].'</td>
                                              <td>'.$book["check_out"].'</td>
                                              <td style="padding: 0px;width: 90px; height:50px;">'.$payment_status.'</td>
                                              <td style="padding: 0px;width: 50px; height:50px;">
                                                <button type="button" class="btn btn-danger" style="width: 50px; height:50px;">
                                                  <img src="Content\images\icone\cancel.png" style="height: 20px;">
                                                </button>
                                              </td>
                                            </tr>';
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </div>



                        </div>
                        <?php if ($is_manager) {
                          echo '<div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row">
                                    <table>
                                      <tbody>';
                          $hotel_list = $model->get_hotel_by_manager_id($staff[0]["emp_id"]);
                          foreach ($hotel_list as $h) {
                            echo '    <tr>
                                        <th scope="row">Sophie Tells de '.$h["hotel_localisation_city"].'</th>
                                        <td class="row_table_managment"><button type="button" class="btn btn-primary">Gérer</button</td>
                                      </tr>';
                          }
                          echo '  </tbody>
                                </table>
                              </div>
                            </div>';
                        } ?>
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
