<?php
$selection_guide_post = tr_meta_box('Selection Guide Post Addon');
$selection_guide_post->addPostType('post');
$selection_guide_post->setCallback(function(){
    $form = tr_form();


    $repeater_type_of_label = $form->repeater('Type Of Label')->setFields([
        $form->image('Photo'),
        $form->text('Heading'),
        $form->editor('Content'),
    ]);
    $repeater_type_of_label->setLimit(6);
    echo $repeater_type_of_label;

    $repeater_type_of_products = $form->repeater('Type Of Products For Labels')->setFields([
        $form->text('Heading'),
    ]);
    $repeater_type_of_products->setLimit(6);
    echo $repeater_type_of_products;

    $repeater_ribbon_types = $form->repeater('Ribbon Types')->setFields([
        $form->image('Photo'),
        $form->text('Heading'),
        $form->editor('Content'),
    ]);
    $repeater_ribbon_types->setLimit(6);
    echo $repeater_ribbon_types;
});

$addon_page->setPriority('default');