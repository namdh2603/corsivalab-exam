<?php
    $limit = $data['number_comments'] ? $data['number_comments'] : -1;
    $args = array('
        status'      => 'approve',
        'post_status' => 'publish',
        'orderby' => 'comment_date_gmt',
        'order'   => 'DESC'
    );
    $comments = get_comments($args);
    $comments = array_slice( $comments, 0, $limit );
    if(!empty($comments)) {
?>
    <section class="section section-testimonials">        
        <div class="img-bg">
            <?php if(!empty(get_attachment($data['background'])['src'])) {
            ?>
                <img src="<?php echo get_attachment((int)$data['background'])['src']; ?>" alt="" class="img-cover">
            <?php
            } else {
            ?>
                <div style="background: #9E9E9E; width:100%; height:100%;"></div>
            <?php
            }; ?>
        </div> 
        <div class="container">
            <div class="row">
                <div class="title text-center" <?php echo zoom_in(1); ?>>   
                    <?php echo $data['title']; ?>
                </div>
                <div class="content testimonials owl-carousel owl-theme"  <?php echo fade_up(2); ?>>
                    <?php
                        foreach($comments as $comment) {
                            ?>
                              <div class="item">   
                                               
                            <?php
                                $member_name = get_post( $comment->comment_post_ID );
                            ?>
                                <div class="rating">
                                    <?php
                                        if ( $rating = get_comment_meta( $comment->comment_ID, 'rating', true ) ) {
                                            for ( $i = 1; $i <= $rating; $i++ ) {
                                    ?>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                    <?php
                                            };//foreach star
                                        }; //if
                                    ?>
                                </div>
                                <div class="author">
                                    <?php echo $comment->comment_author; ?>
                                </div>                   
                                <div class="comment">
                                    <?php echo $comment->comment_content; ?>
                                </div>
                            </div>
                        <?php
                        };//foreach item
                    ?>
                </div>        
            </div>
        </div>
    </section>
<?php
    };//if

