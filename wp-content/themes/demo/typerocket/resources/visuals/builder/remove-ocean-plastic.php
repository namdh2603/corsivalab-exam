<?php $choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
   $f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
   $f_class = 'cherlotte-font';
} else {
   $f_class = '';
}
$padding = padding_tr($data['padding_top'], $data['padding_right'],  $data['padding_bottom'],  $data['padding_left']);
?>
<div class="section section-padding remove-ocean-plastic" style="<?php echo $padding; ?>">
   <div class="container">
      <?php if (!empty($data['title'])) { ?>
         <div class="title-section text-left <?php echo $f_class; ?>"> <?php echo $data['title']; ?></div>
      <?php } ?>
      <div class="row align-items-center">
         <div class="col-6">
            <img class="w-100" src="<?php echo get_attachment($data['img'])['src']; ?>" />
         </div>
         <div class="col-4 offset-lg-2">
            <div class="item-2-col">
               <div class="row">
                  <div class="col-6">
                     <div class="item text-center">
                        <div class="item-img mx-auto">
                           <img class="" src="<?php echo get_attachment($data['img_1'])['src']; ?>" />
                        </div>
                        <div class="item-title"><?php echo $data['title_1']; ?></div>
                        <div class="item-description"><?php echo $data['description_1']; ?></div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="item text-center">
                        <div class="item-img mx-auto">
                           <img class="" src="<?php echo get_attachment($data['img_2'])['src']; ?>" />
                        </div>
                        <div class="item-title"><?php echo $data['title_2']; ?></div>
                        <div class="item-description"><?php echo $data['description_2']; ?></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>