	<div class="testimonials">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/testimonials.jpg" data-speed="0.8"></div>
		<div class="testimonials_overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme test_slider">

              <?php

                $list_testimonials = $model->get_all_complaint();

                foreach ($list_testimonials as $testimonials) {

                  $user = $model->get_user_by_id($testimonials["id_user"]);

                  echo "<!-- Slide -->
                  <div  class=\"test_slider_item text-center\">
                    <div class=\"rating rating_5 d-flex flex-row align-items-start justify-content-center\"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class=\"testimonial_title\"><a href=\"#\">".$testimonials["title_complaint"]."</a></div>
                    <div class=\"testimonial_text\">
                      <p>".$testimonials["complaint"]."</p>
                    </div>
                    <div class=\"testimonial_image\"><img src=\"Content/images/pdp_default.png\" alt=\"\"></div>
                    <div class=\"testimonial_author\"><a href=\"#\">".$user[0]["firstname"]." ".$user[0]["lastname"]."</a></div>
                  </div>";

                }
              ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
