<section class="section section-testimonials">
  <div class="img-bg">
    <?php if (!empty(get_attachment($data['background'])['src'])) {
    ?>
      <img src="<?php echo get_attachment((int)$data['background'])['src']; ?>" alt="" class="img-cover">
    <?php
    } else {
    ?>
      <div style="background: #9E9E9E; width:100%; height:100%;"></div>
    <?php
    }; ?>
  </div>
  <div class="container">
    <div class="title-section text-center" <?php echo zoom_in(1); ?>>
      <?php echo $data['title']; ?>
    </div>
    <div class="content testimonials" <?php //fade_up(2); 
                                      ?>>
      <div class="swiper-container testimonials-carousel-container">
        <div class="swiper-wrapper">
          <?php $n = 0;
          foreach ($data['list'] as $item) {
            $n++;
            $title = $item['title'];
            $name = $item['name'];
            echo '<div class="swiper-slide"><div class="item text-center mt-3"></i><div class="testimonials-title fu-book">' . $title . '</div><div class="testimonials-name">' . $name . '</div></i></div></div>';
          }
          ?>
        </div>

      <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
      <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>
      </div>
      <script>
        jQuery(document).ready(function($) {
          var testimonials_swiper = new Swiper(".testimonials-carousel-container", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
              delay: 6000,
              disableOnInteraction: false,
            },
			  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
          });
        });
      </script>
    </div>
  </div>
</section>