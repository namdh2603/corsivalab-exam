<?php
$padding_top = $data['padding_top'];
$padding_bottom = $data['padding_bottom'];
$padding_left = $data['padding_left'];
$padding_right = $data['padding_right'];
if($padding_top != null){
   $padding_top = 'padding-top: '.$padding_top.'rem';
}

if($padding_bottom != null){
   $padding_bottom = 'padding-bottom: '.$padding_bottom.'rem';
}

if($padding_left  != null){
   $padding_left = 'padding-left: '.$padding_left.'rem';
}

if($padding_right  != null){
   $padding_right = 'padding-right: '.$padding_right.'rem';
}
echo TR_PATH;
?>
<section class="section section-banner section-padding" style="<?php echo $padding_top.$padding_bottom.$padding_left.$padding_right; ?>">
   <div class="container">
            <div class="image" <?php echo fade_up(2); ?>>
               <img src="<?php echo get_attachment($data['banner'])['src']; ?>" alt="" class="img-cover">
            </div>
            </div>
</section>