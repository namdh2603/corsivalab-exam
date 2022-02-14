<section class="section section-collection-small">
    <?php if(!empty($data['background'])) {?>
        <div class="background">
            <img src="<?php echo get_attachment($data['background'])['src']; ?>" alt="" class="img-cover">            
        </div>
    <?php }; //if ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="title-section col-12 text-center"><?php echo $data['title'];?></div>
            <div class="description col-10 col-lg-8">
                <?php echo $data['description']; ?>
            </div>
            <div class="block-content col-lg-12">
                <div class="row">
                    <?php if(!empty($data['list'])) {
                        foreach($data['list'] as $item ) {    
                    ?>
                        <div class="col-12 col-lg-4">
							
							
							
                        <div class="item  d-flex <?php echo $item['text_top'] ? 'flex-column-reverse' :''; ?>">
							
                            <div class="image">
                                <img src="<?php echo  get_attachment($item['thumbnail'])['src']; ?>" alt="thumbnail" class="img-cover">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <?php echo $item['title']; ?>
                                </div>
                                <div class="description">
                                    <?php echo $item['short_description']; ?>
                                </div>                                
                            </div>
                        </div>    
                        </div>    
                    <?php 
                        };//foreach
                    };//if ?>
                </div>
            </div>
        </div>
    </div>
</section>