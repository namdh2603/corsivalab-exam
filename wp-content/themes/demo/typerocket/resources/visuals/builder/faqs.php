<section class="section section-faqs">
    <?php if(!empty($data['background'])) { ?>
        <div class="bg-img">
            <img src="<?php echo get_attachment($data['background'])['src']; ?>" class="img-cover">
        </div>
    <?php }; ?>
    <div class="container">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="content">
                <div class="title">
                    <h2 class="text-blue capitalize cherlotte-font">
                        <?php echo $data['title']; ?>
                    </h2>
                </div>        
                <?php if(!empty($data['list'])){
                    $count = 1;
                    foreach($data['list'] as $item ){
                ?>
                <div class="accordion-parent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?php echo $count; ?>">
							        <button class="accordion-button btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#parent-<?php echo $count; ?>" aria-expanded="true" aria-controls="parent-<?php echo $count; ?>">

<!--                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#parent-<?php echo $count; ?>" aria-expanded="false" aria-controls="parent-<?php echo $count; ?>"> -->
                                <?php echo $item['title']; ?>
                            </button>
                        </h2>
                        <div id="parent-<?php echo $count; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $count; ?>" data-bs-parent="#accordionExample">
                            <?php if(!empty($item['faqs_list'])) {
                                $count_child = 1;
                                foreach($item['faqs_list'] as $faq ) {
                            ?>
                                <div class="accordion-child">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-child-<?php echo $count_child; ?>">
<!--                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#child-<?php echo $count_child; ?>" aria-expanded="false" aria-controls="child-<?php echo $count_child; ?>"> -->
												
												<button class="accordion-button btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#child-<?php echo $count_child; ?>" aria-expanded="false" aria-controls="child-<?php echo $count_child; ?>">
													
													
                                                <?php echo $faq['title']; ?>
                                            </button>
                                        </h2>
                                        <div id="child-<?php echo $count_child; ?>" class="accordion-collapse collapse" aria-labelledby="heading-child-<?php echo $count_child; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-child">
                                                <?php echo $faq['description']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $count_child++; };//foreach child
                                };//if faqs ?>
    
                        </div>
                    </div>
            
                </div>
                <?php $count++; };//foreach
                };//if?>
    
            </div>
        </div>
    </div>
</section>

