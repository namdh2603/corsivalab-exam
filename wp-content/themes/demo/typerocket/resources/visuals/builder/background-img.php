<?php 
    if(!empty($data['list'])){
?>
    <div class="background-image position-absolute" style="transform: translateY(<?php echo $data['start_form_bottom'] ? '-100%' : '0'; ?>);">
        <?php 
            foreach( $data['list'] as $item ){
                if(!empty($item['background'])){
        ?>
        <div class="block-image"
            <?php if(!empty($item['spacing'])) { 
                echo 'style="';
                foreach( $item['spacing'] as $spacing ) { 
                    echo 'margin-'.$spacing['direction'].': '.$spacing['value'].$spacing['unit'].';';
                };//foreach
                echo ' " ';
            };//if spacing ?>
        >
            <img src="<?php echo get_attachment($item['background'])['src']; ?>" 
                style="width:100%; <?php echo $item['height'] ? 'height:'.$item['height'].'px;' : 'height:100%' ; ?>" >
                        
        </div>
        <?php
                };//if
            };//foreach
        ?>
    </div>
<?php
    };//if