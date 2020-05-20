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
<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/room.css">
<link rel="stylesheet" type="text/css" href="styles/room_responsive.css">
</head>
<body>

  <?php
    if (!isset($_GET["room_type"])) {

      echo"<script>alert('Une erreur est survenue.')</script>";
      header('Refresh: 1; url=index.php?view=hotels');
    }
      echo '<div class="super_container">';
      require("modules/header.php");
      $room_type_illustration = "Content/images/illustration_chambre/".$_GET["room_type"].".jpg";
      $room_type = $model->get_room_type_by_id($_GET["room_type"]);

  ?>


  <div class="home" style="height: 220px;">
    <div class="background_image" style="background-image:url(Content/images/blog_1.jpg)"></div>
    <div class="home_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="home_content text-center">
              <div class="home_title">Votre Chambre</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Page Content -->
  <div class="container searching_container">

    <div class="row">


      <div class="offset-2 col-lg-9">

        <div class="card mt-4 bg-dark">
          <img class="card-img-top img-fluid" src=<?php echo $room_type_illustration; ?> alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $room_type[0]["room_type"]; ?></h3>
            <h4><?php echo $room_type[0]["price"]; ?>€</h4>
            <?php echo '
            <div class="pull-right nbr_bed">
              <h6>'.$room_type[0]["nbr_bed"].' x</h6>
              <img class="bed_icon pull-right" src="Content\images\icone\bed.png">
            </div>';
            ?>
          </div>
        </div>
        <!-- /.card -->

        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

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
