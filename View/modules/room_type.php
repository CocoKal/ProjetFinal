<div class="testimonials">
  <div class="testimonials_overlay"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="card-group">



            <?php

              $room_type = $model->get_all_room_type();

              foreach ($room_type as $type) {


                echo '

                <div class="card bg-dark" style="width: 25%;">
                <a href="index.php?view=room&room_type='.$type["room_type_id"].'">
                  <img class="card-img-top illustration_chambre" src="Content/images/illustration_chambre/'.$type["room_type_id"].'.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">'.$type["room_type"].'</h4>
                    <p>Prix: '.$type["price"].'€</p>
                    <div class="pull-right nbr_bed">
                      <h6>'.$type["nbr_bed"].' x</h6>
                      <img class="bed_icon pull-right" src="Content\images\icone\bed.png">
                    </div>
                  </div>
                  </a>
                </div>
                ';

              }
            ?>

      </div>
    </div>
  </div>
</div>
