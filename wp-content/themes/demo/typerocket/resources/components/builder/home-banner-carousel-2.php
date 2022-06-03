<h1>Photo Carousel</h1>
<?php

    echo $form->text('Title');
	$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
	];
	echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');

echo $form->repeater('List')->setFields([
    $form->image('Background'),
    $form->text('height')->setLabel('Image Height')->setType('number')->setHelp('rem'),
]);


echo $form->toggle('title_color')->setLabel('Active white color Title');
echo $form->toggle('title_shadow')->setLabel('Active shadow Title');
$txt = 'Margin';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);