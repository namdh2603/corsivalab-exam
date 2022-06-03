<section class="section section-contact-us">
    <div class="background-img">
        <img src="<?php echo get_attachment($data['background'])['src']; ?>"class="img-cover">
    </div>
    <div class="container">
        <div class="form-infor row">
            <div class="col-12 block-title">
                <div class="row flex-column align-items-center">
                    <div class="col-12">
                        <div class="title-section text-center cherlotte-font">
                            <?php echo $data['title'] ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="description-section text-body text-center">
                            <?php echo $data['description'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 block-content">
                <div class="row">
                    <div class="col-12 col-lg-6 infor">
                        <div class="row">
                            <div class="item block-phone col-12 col-lg-6">
                                <div class="title-1"><?php echo $data['phone_title']; ?></div>
                                <div class="block-content">
                                    <ul>
                                        <?php if(!empty($data['phone_list'])) {  
                                            foreach( $data['phone_list'] as $phone ) {     
                                        ?>
                                            <li class="text-body"><img class="mr-2" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Contact/Union 25.png" style="width: 1rem" /><?php echo $phone['phone_number']; ?></li>
                                        <?php 
                                            }; //foreach
                                        }; //if?>
                                    </ul>
                                </div>
                            </div>
                            <div class="item block-email col-12 col-lg-6">
                                <div class="title-1">
                                    <?php echo $data['mail_title']; ?>
                                </div>
                                <div class="block-content">
                                    <ul>
                                        <?php if(!empty($data['mail_list'])) {  
                                            foreach( $data['mail_list'] as $email ) {     
                                        ?>
                                            <li class="text-body"><img class="mr-2" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Contact/email (1).png" style="width: 1rem" /><?php echo $email['mail_address']; ?></li>
                                        <?php 
                                            }; //foreach
                                        }; //if?>
                                    </ul>
                                </div>
                            </div>
                            <div class="item block-sci col-12 col-lg-6">
                                <div class="title-1">
                                    <?php echo $data['infor_title']; ?>
                                </div>
                                <div class="block-content">
                                    <ul class="d-flex">
                                        <?php if(!empty($data['icon_list'])) {  
                                            foreach( $data['icon_list'] as $sci ) { 
                                        ?>
                                            <li class="">
                                                <a href="<?php echo $sci['link']; ?>">
<!--                                                     <i class="sci-icon <?php echo $sci['social_icon'] ?>" aria-hidden="true" style="color:<?php echo $sci['color']; ?>"></i>  -->
													
												 <img class="mr-3" src="<?php echo get_attachment((int)$sci['icon'])['src']; ?>" style="width: 1rem">
                                                </a>
                                            </li>
                                        <?php 
                                            }; //foreach
                                        }; //if?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 col-lg-5 offset-lg-1 contact-form">
                        <?php if(!empty($data['contact_form_7'])) { echo do_shortcode( '[contact-form-7 id="'.$data["contact_form_7"].'"]' );}; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="address-infor row justify-content-center">
            <div class="col-12 title-section text-center cherlotte-font">
                <?php echo $data['address_title']; ?>
            </div>
            <div class="col-12">
                <div class="row">

                    <?php if(!empty($data['address_list'])) { 
                        foreach ($data['address_list'] as $address) {
                    ?>
                        <div class="col-4 col-lg-3">
                            <div class="title title-1">
                                    <?php echo $address['title']; ?>
                            </div>
                            <div class="address text-body">
                            <?php echo $address['description']; ?>
                            </div>
                        </div>
                    <?php };//foreach
                    };//if ?>                  
                                 
                </div>
            </div>                                      
        </div>
    </div>
</section>
