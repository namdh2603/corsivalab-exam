<?php
$choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
   $f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
   $f_class = 'cherlotte-font';
} else {
   $f_class = '';
}
$margin = margin_tr($data['padding_top'], $data['padding_right'],  $data['padding_bottom'],  $data['padding_left']);
if (!empty($data['banner'])) { ?>
   <section class="section-rewards-banner section-margin" style="<?php echo $margin; ?>">
      <img src="<?php echo get_attachment($data['banner'])['src']; ?>" class="w-100" alt="img" />
      <div class="content-absolute w-100">
         <div class="container">
            <div class="title-section text-center text-black <?php echo $data['title_color'] ? 'text-white' : '' ?> <?php echo $data['title_shadow'] ? 'text-title-shadow' : '' ?> <?php echo $f_class; ?>" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
            <div class="description-section text-center <?php echo $data['text_color'] ? 'text-white' : '' ?>" <?php echo zoom_in(2); ?>>
               <?php echo $data['description']; ?>
            </div>
         </div>
      </div>
   </section>
<?php } ?>