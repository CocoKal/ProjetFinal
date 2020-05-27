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
    //Vérifiquation si l'utilisateur est connecté
    if (!isset($_COOKIE["id"])) {

      //Si non alors
      //Afficher une alert
      echo"<script>alert('Une erreur est survenue.')</script>";
      //Rediriger vers l'acceuil
      header('Refresh: 1; url=index.php');
    }
    //Si la variable POST booking_id_delete est présente
    if (isset($_POST["booking_id_delete"])) {
      //Supprimer le booking correspondant à cet id
      $model->delete_booking_by_id($_POST["booking_id_delete"]);
    }
      //Ajout du header
      echo '<div class="super_container">';
      require("modules/header.php");

      //Test si l'utilisateur est un manager
      //Récupération des membres du staff en fonction de l'id de l'utilisateur
      $staff = $model->get_staff_by_id_user($_COOKIE["id"]);
      //Initialisation de la variable qui stock si l'utilisateur est un manager
      $is_manager = false;

      //Si le résultat de la requete n'est pas vide
      if (!empty($staff)) {
        //Test si le membre du staff est un manager
        if ($staff[0]["staff_type_id"] == 1) {
          //Alors stocker que l'utilisateur est un manager
          $is_manager = true;
        }
      }

  ?>

    <!-- Home -->

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

  <!--Container du profile et de ses informations-->

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
                                //Si l'utilisateur est un manager
                                  if ($is_manager) {
                                    //Rajouter l'option de voir ses hotels
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
                      //Test si l'utilisateur est un administrateur
                      if ($model->check_if_admin($_COOKIE["id"])) {
                        //S'il est admin alors rajotuer un lien vers le Dashboard
                        echo '<a href="admin/home.php"><input type="submit" class="profile-edit-btn" name="dash" value="Dashboard"/></a>';
                      }
                      ?>
                      <!--Bouton vers le panier -->
                      <a href="index.php?view=recap_bag"><input type="submit" class="profile-edit-btn" name="btn_bag" value="Votre Panier"/></a>
                      <!--Bouton pour se deconnecter -->
                      <a href="index.php?log=no"><input type="submit" class="log-out-btn" name="deco" value="Se déconnecter"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-4 col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">

                          <!--Tableau des informations de compte -->
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

                            <!--Tableau des réservations de l'utilisateur -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">
                              <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Ville</th>
                                    <th scope="col">N°</th>
                                    <th scope="col">Date arrivée</th>
                                    <th scope="col">Date départ</th>
                                    <th scope="col">Annuler</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    //Récupération des booking correspondant à l'utilisateur
                                    $booking = $model->get_all_booking_by_id_user($user[0]["id"]);

                                    //Pour chaque booking
                                    foreach ($booking as $book) {
                                      //Récupérer les informations de la chambre
                                      $room = $model->get_room_by_id($book["room_id"]);
                                      //Récupération des informations de l'hotel
                                      $hotel = $model->get_hotel_by_id($room[0]["hotel_id"]);

                                      /*Calcul de l'interval entre la date actuelle
                                      et la date d'arrivée du bookign courant */
                                      //Récupérer de la date actuelle sous forme de DateTime
                                      $current_time = new DateTime("now");
                                      //Récupération de la date d'arrivée sous forme de DateTime
                                      $time = new DateTime($book["check_in"]);
                                      //Calcul de la différence entre les deux dates
                                      $interval = date_diff($current_time, $time);
                                      //Formatage de l'interval
                                      $interval = $interval->format('%R%a');

                                      //Affichage du booking et de ses information sous forme de ligne d'un tableau
                                      echo '<form method="post" action="index.php?view=account">
                                      <input type="hidden" name="booking_id_delete" value="'.$book["booking_id"].'">
                                            <tr>
                                              <td>'.$hotel[0]["hotel_localisation_city"].'</td>
                                              <td>'.$room[0]["room_no"].'</td>
                                              <td>'.$book["check_in"].'</td>
                                              <td>'.$book["check_out"].'</td>
                                              <td style="padding: 0px;width: 50px; height:50px;">';
                                              //Si l'inteval est superieur à 2 (48h)
                                              if ($interval >= 2) {
                                                //Afficher un boutton fonctionnel, coloré de rouge
                                                echo '<button type="submit" class="btn btn-danger" style="width: 80px; height:50px;">';
                                              }
                                              else {
                                                //Ajout d'un boutton non fonctionnel, coloré de gris
                                                echo '<button type="button" class="btn btn-dark" style="width: 80px; height:50px;">';
                                              }
                                              //Affichage du boutton d'annulation
                                              echo '    <img src="Content\images\icone\cancel.png" style="height: 20px;">
                                                </button>
                                              </td>
                                            </tr>
                                          </form>';
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </div>



                        </div>
                        <?php
                        //Si l'utilisateur est un manager
                        if ($is_manager) {
                          //Affichage du tableau de gestion des hotels
                          echo '<div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row">
                                    <table>
                                      <tbody>';
                          //Récupération des hotels sous la responsabilité du manager actuel
                          $hotel_list = $model->get_hotel_by_manager_id($staff[0]["emp_id"]);

                          //Pour chaque hotel de la liste
                          foreach ($hotel_list as $h) {

                            //Affichage sous forme de ligne le nom de l'hotel
                            echo '    <tr>
                                        <th scope="row">Sophie Tells de '.$h["hotel_localisation_city"].'</th>
                                      </tr>';
                          }
                          //Fermeture du tableau
                          echo '  </tbody>
                                </table>
                              </div>
                            </div>';
                        } ?>
                    </div>
                </div>
        </div>
      </div>

          <!--Ajout du footer -->

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
