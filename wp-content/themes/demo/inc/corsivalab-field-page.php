<?php
$addon_page = tr_meta_box('Page Additional');
$addon_page->addPostType('page');
$addon_page->setCallback(function(){
    $form = tr_form();
	
    $options_2 = [
        'Yes' => 'yes',
        'No' => 'no',
    ];
    echo $form->radio('border_radius')->setLabel('Border Radius For All Images')->setOptions($options_2)->setSetting('default', 'yes');
	
	
		echo $form->repeater('Social Icon Float')->setFields([
            $form->row(
                $form->image('Icon'),
                $form->text('Link Icon'),
            ),
        ]);

});
$addon_page->setPriority('default');


