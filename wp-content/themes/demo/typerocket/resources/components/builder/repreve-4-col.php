<h1>Repreve 4 Cols</h1>
<?php
echo $form->color('bg_color_section')->setLabel('Background Section');
echo $form->text('Title');
echo $form->image('Background');
echo $form->text('Background Position');

echo $form->toggle('container')->setLabel('More space for container section');

$options = [
	'Default' => 'default',
	'Button layout 1' => 'layout-1',
	'Button layout 2' => 'layout-2'
];

	$options_2 = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
	];



echo $form->radio('Choose Button Layout')->setOptions($options)->setSetting('default', 'default');
echo $form->radio('choose_font')->setLabel('Change Font Title')->setOptions($options)->setSetting('default', 'default');

echo $form->toggle('font_btn')->setLabel('Active Stevie Sans font for button');

echo $form->text('Column Number')->setType('number');

echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);

echo $form->repeater('List')->setFields([
	

	
    $form->image('Thumbnail'),
    $form->row(
		$form->text('Title'),
		$form->text('Link Button')->setDefault('#'),
        $form->text('Text Button'),
    )
]);