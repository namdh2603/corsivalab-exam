<?php $choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
    $f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
    $f_class = 'cherlotte-font';
} else {
    $f_class = '';
}
if (!empty($data['list'])) :
?>
    <div class="section section-features home-countdown home-countdown-php" <?php if (!empty($data['background'])) { ?> style="background: url( <?php echo get_attachment($data['background'])['src']; ?> ); background-size: cover; " <?php } ?>>
        <link rel="stylesheet" href="https://cdn.leanhduc.pro.vn/utilities/animation/shake-effect/style.css" />
		<script type="text/javascript" src="https://rawgit.com/moagrius/isOnScreen/master/jquery.isonscreen.min.js"></script>
		
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
		
		
        <div class="container">
            <?php if (!empty($data['title'])) { ?>
                <div class="title-section text-center <?php echo $f_class; ?>"> <?php echo $data['title']; ?></div>
            <?php } ?>
            <div class="row prg-count-inner">
                <div class="col-12 col-lg-2"></div>
                <?php $n = 0;
                foreach ($data['list'] as $item) {
                    $n++; ?>
                    <div class="col-12 col-md-4 col-lg-4 mb-4">
                        <div class="item">
                            <div class="text-center mx-auto w-100">
								
								<div class="mx-0 mb-3">
                                <img class='rung' src='<?php echo get_attachment($item['icon'])['src']; ?>' alt=''>
								</div>
                                <div class="figuers position-relative" <?php //echo zoom_in($n); ?>>
									<div class="prg-count-wrap">
									
									<span class="woo-sctr-countdown-date-value-wrap woo-sctr-countdown-value-wrap  woo-sctr-countdown-two-vertical-wrap">
										<span class="woo-sctr-countdown-date-value woo-sctr-countdown-value woo-sctr-countdown-value-animation-default woo-sctr-countdown-two-vertical-top woo-sctr-countdown-two-vertical-top-cut-default led-font" data-value="0"><span class="count2">0</span></span>
										<span class="count1 prg-count led-font" data-count="<?php echo $item['figuers']; ?>">0</span>
										</span>
                                    
										</div>
                                </div>
                                <div class="title">
                                    <?php echo $item['title']; ?>
                                </div>
                                <?php if (!empty($item['description'])) { ?>
                                    <div class="description stevie">
                                        <?php echo $item['description']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12 col-lg-2"></div>
            </div>
			<?php //echo do_shortcode('[sales_countdown_timer id="1645728184205"]'); ?>
        </div>
    </div>
<script>
jQuery(document).ready(function($) {
	
	function checkDisplay(){
  $('.prg-count').each(function() {
      var $this = $(this);
      if ($this.isOnScreen()) {
        var countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        }, {
          duration: 4000,
//           easing: 'linear',
//           swing
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
// 			$this.parent().find('.woo-sctr-countdown-date-value').attr( "data-value", Math.floor(this.countNum) );
			$this.parent().find('.count2').text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
			$this.parent().find('.count2').text(Math.floor(this.countNum));
			  
//             $this.parent().find('.woo-sctr-countdown-date-value').attr( "data-value", this.countNum );
            //alert('finished');
          }
        });

		  
// 		 $this.animationCounter({
//           start: 0,
//           step: 20,
//           end: countTo,
//           delay: 100
//         });
		  
// 		  $this.parent().find('.count2').animationCounter({
//           start: 0,
//           step: 20,
//           end: countTo,
//           delay: 100
//         });
// 		  $this.on('DOMSubtreeModified', function(){

// 		  $this.parent().find('.woo-sctr-countdown-date-value').attr( "data-value", $this.text());
// 		  });
      }
    });
}
	
	
	
    checkDisplay();
  
  $(window).on('resize scroll', function() {
    checkDisplay();
  });
});



</script>
<?php
endif;
?>