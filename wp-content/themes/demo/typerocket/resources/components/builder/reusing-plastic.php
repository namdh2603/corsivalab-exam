<h1>Reusing Plastic</h1>
<?php
echo $form->text('Title');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->editor('Description');
echo $form->image('Small Thumbnail Top');
echo $form->image('Small Thumbnail Back');
echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);