<h1>Ambassador Content</h1>
<?php
echo $form->image('Background');
echo $form->image('Image');
echo $form->text('Title');
echo $form->text('Welcome');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->editor('Description');

echo $form->toggle('border')->setLabel('Has Border for Content?');
echo $form->row(
    $form->text('Padding Top')->setType('number')->setHelp('rem'),
    $form->text('Padding Bottom')->setType('number')->setHelp('rem'),
    $form->text('Padding Left')->setType('number')->setHelp('rem'),
    $form->text('Padding Right')->setType('number')->setHelp('rem'),
);