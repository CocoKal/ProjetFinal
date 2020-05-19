<div class="container">
  <div class="row service_title text-center">
    <h1 class="offset-4 col-4">Services</h1>
  </div>
  <div class="row">
    <?php
      $services = $model->get_all_services();
      $hotel_service = $model->get_all_hotel_services_by_hotel_id($hotel[0]["hotel_id"]);

      foreach ($hotel_service as $service) {
        echo '
        <div class="col">
          <img src="Content/images/icone/'.$service["service_id"].'.png">
        </div>
        ';
      }
  ?>
  </div>
</div>
