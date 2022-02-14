<?php
$padding_top = $data['padding_top'];
$padding_bottom = $data['padding_bottom'];
$padding_left = $data['padding_left'];
$padding_right = $data['padding_right'];
if($padding_top != null){
   $padding_top = 'padding-top: '.$padding_top.'px';
}

if($padding_bottom != null){
   $padding_bottom = 'padding-bottom: '.$padding_bottom.'px';
}

if($padding_left  != null){
   $padding_left = 'padding-left: '.$padding_left.'px';
}

if($padding_right  != null){
   $padding_right = 'padding-right: '.$padding_right.'px';
}
?>
<section>
    <div class="section section-whygood" style="<?php echo $padding_top.$padding_bottom.$padding_left.$padding_right; ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="title"><?php echo $data['title']; ?></div>
                    <div class="col-12 col-lg-10">
                        <div class="description"><?php echo $data['description']; ?></div>
                    </div>
                </div>
            </div>
    </div>
</section>