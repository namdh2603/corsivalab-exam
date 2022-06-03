<h1>Home Countdown</h1>
<?php
echo $form->image('Background');
echo $form->text('Title');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->color('Text Figuers Color');
echo $form->repeater('List')->setFields([
    $form->text('Figuers'),	
    $form->text('Title'),
	$form->image('Icon'),
    $form->editor('Description'),
]);