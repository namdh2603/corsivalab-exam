<section class="section section-which-make">
    <div class="bg-img">
        <?php if (!empty($data['background'])) { ?>
            <img src="<?php echo get_attachment($data['background'])['src']; ?>" alt="background" class="img-cover">
        <?php }; ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="title"><?php echo $data['title']; ?></div>
                <div class="description">
                    <?php echo $data['description']; ?>
                </div>
            </div>
            <div class="col-12 col-lg-10 mx-auto">
                <div class="block-content">
                    <div class="row">
                        <?php if (!empty($data['list'])) {
                            foreach ($data['list'] as $item) {
                        ?>
                                <div class="col-6 col-lg-4">
                                    <div class="item">
                                    <div class="content">
                                        <div class="bg-img">
                                            <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Why Repreve/Group-13222.png" alt="" class="img-cover"> -->
                                        </div>
                                        <div class="title"><?php echo $item['title']; ?></div>
                                        <div class="description">
                                            <?php echo $item['description'] ?>
                                        </div>
                                    </div></div>
                                </div>
                        <?php
                            }; //forecach
                        }; //if
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="subtitle">
                            <?php echo $data['subtitle']; ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="sub-description">
                            <?php echo $data['sub_description']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>