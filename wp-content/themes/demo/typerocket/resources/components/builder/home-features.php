<h1>Home Features</h1>
<?php
echo $form->image('Background');
echo $form->text('Title');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->toggle('Full Width Icon');
echo $form->repeater('List')->setFields([
    $form->image('Icon'),
    $form->text('Title'),
    $form->editor('Description'),
]);