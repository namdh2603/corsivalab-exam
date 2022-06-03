<?php
if (!empty($data['list'])) {
?>
    <section id="">
        <div class="section section-mask" <?php if (!empty($data['background'])) { ?> style=" background: url( <?php echo get_attachment($data['background'])['src']; ?> );
            background-size: cover; " <?php }; //if 
                                        ?>>
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($data['list'] as $item) { 
                        $title = $item['title'];
                        $title = str_replace("///", "<br>", $title);
                        ?>
                        <div class="col-12 col-lg-5">
                            <div class="item" <?php echo fade_up(1); ?>>
                                <div class="title cherlotte-font">
                                    <?php echo $title; ?>
                                </div>
                                <div class="description" <?php echo fade_up(3); ?>>
                                    <?php echo $item['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>

            </div>
        </div>
    </section>
<?php  }; //if 
?>