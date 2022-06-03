<h1>Shop Collections</h1>
<?php

$options_font = [
	'Default' => 'default-font',
	'Carolissa' => 'carolissa-font',
	'Cherlotte' => 'cherlotte-font'
];
$options_btn = [
	'Default' => 'btn-default',
	'Button layout 1' => 'btn-layout-1',
	'Button layout 2' => 'btn-layout-2'
];

echo $form->text('Title');
// echo $form->image('Background');
// echo $form->text('Background Position');

echo $form->select('style_font')->setLabel('Choose Font')->setOptions($options_font)->setSetting('default', 'default-font');
echo $form->select('style_btn')->setLabel('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'btn-default');

// echo $form->toggle('Title Shadow');
echo $form->repeater('List')->setFields([
    $form->image('img')->setLabel('Thumbnail'),
    $form->row(
		$form->text('Title'),
		$form->text('Link Button')->setDefault('#'),
    )
]);

$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);