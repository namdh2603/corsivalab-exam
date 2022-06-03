<h1>Repreve 3 Cols</h1>
<?php
echo $form->text('Title');
echo $form->image('Background');
echo $form->text('Background Position');

$options = [
	'Default' => 'default',
	'Button layout 1' => 'layout-1',
	'Button layout 2' => 'layout-2'
];
echo $form->radio('Choose Button Layout')->setOptions($options)->setSetting('default', 'default');



echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);
echo $form->toggle('Title Shadow');
echo $form->repeater('List')->setFields([
    $form->image('Thumbnail'),
    $form->row(
		$form->text('Title'),
	$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
	],
	$form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default'),
		$form->text('Link Button')->setDefault('#'),
        //$form->text('Text Button'),
    )
]);

