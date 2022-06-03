<?php $choose_font = $data['choose_font'];
if($choose_font == 'carolissa'){
	$f_class = 'carolissa-font';
} elseif($choose_font == 'cherlotte'){
	$f_class = 'cherlotte-font';
} else {
	$f_class = '';
}
if (!empty($data['list'])):
?>
    <div class="section section-features" data="home-features.php" <?php if (!empty($data['background'])) { ?> style="background: url( <?php echo get_attachment($data['background'])['src']; ?> ); background-size: cover; " <?php } ?>>
        <div class="container">
			<?php if (!empty($data['title'])) { ?>
			<div class="title-section text-center <?php echo $f_class; ?>"> <?php echo $data['title']; ?></div>
								<?php } ?>
            <div class="row">
                <?php $n = 0;
                foreach ($data['list'] as $item) { ?>
                    <?php if ( $item[ 'title' ] == "Kgs of plastic removed from the ocean so far." ) : ?>
                        <div class="col-3">
                            <div class="item" <?php echo fade_up($n); ?>>
                                <div class="text-center mx-auto w-100">
     								<?php //echo file_get_contents(get_attachment($item['icon'])['src']); ?> 
     								<?php
                                        $args = array(
                                            'status' => array( 'wc-completed' ),
                                        );
                                        $orders = wc_get_orders( $args );
                                    ?>
                                    <style>
.numbers {
  font-family: 'Arial', sans-serif;
  font-size: 70px;
  line-height: 1em;
  text-align: center;
  margin: 0;
  overflow: hidden;
}
.numbers__window {
  display: inline-block;
  overflow: hidden;
  width: 0.5em;
  height: 1em;
}
.numbers__window__digit {
  font: inherit;
  word-break: break-all;
  display: block;
  width: 0;
  padding: 0 0.52em 0 0;
  margin: 0 auto;
  overflow: inherit;
  animation: counting 0.4s steps(10) forwards infinite;
}
.numbers__window__digit::before {
  content: attr(data-fake);
  display: inline-block;
  width: 100%;
  height: auto;
}
@keyframes counting {
  100% {
    transform: translate3d(0, -10em, 0);
  }
}
.numbers__window__digit--1 {
  animation-iteration-count: 5;
}
.numbers__window__digit--2 {
  animation-iteration-count: 6;
}
.numbers__window__digit--3 {
  animation-iteration-count: 9;
}
.numbers__window__digit--4 {
  animation-iteration-count: 12;
}
.numbers__window__digit--5 {
  animation-iteration-count: 15;
}


                                    </style>


                                    <div class="numbers">
                                    <span class="numbers__window">
                                        <span id="order-counter" class="numbers__window__digit numbers__window__digit--1" data-fake="8642519073"><?= count( $orders ) ?></span>
                                    </span>
                                    </div>
                                    <div class="title st-book">
                                        <?php echo $item['title']; ?>
                                    </div>
    								
     			                    <?php if (!empty($item['description'])) : ?>
                                        <!--<div class="description stevie">-->
                                            <?php // echo $item['description']; ?>
                                        <!--</div>-->
    								<?php endif ; ?> 
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <!--<div class="col-6 col-lg-3 mb-3 m-lg-0"> -->
        				<div class="col-3">
                            <div class="item" <?php echo fade_up($n); ?>>
                                <div class="text-center mx-auto w-100">
     								<?php //echo file_get_contents(get_attachment($item['icon'])['src']); ?> 
                                    <img src="<?php echo get_attachment($item['icon'])['src']; ?>" alt="" <?php if($data['full_width_icon']) {echo 'style="width:100%; aspect-ratio: 1/1;"'; } else { echo 'class="icon"'; } ?>>
                                    <div class="title st-book">
                                        <?php echo $item['title']; ?>
                                    </div>
    								
     			                    <?php if (!empty($item['description'])) : ?>
                                        <!--<div class="description stevie">-->
                                            <?php // echo $item['description']; ?>
                                        <!--</div>-->
    								<?php endif ; ?> 
                                </div>
                            </div>
                        </div>
                    <?php endif ; ?>
                        
                    
                <?php } ?>
            </div>
        </div>
    </div>
   
   
   
    
<?php
endif;
?>