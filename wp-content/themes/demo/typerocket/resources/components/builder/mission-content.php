<h1>Mission Content</h1>
<?php
echo $form->image('Background');
echo $form->text('bg_size')->setLabel('Background Size');
echo $form->image('Background Content');
echo $form->text('bg_position_inner')->setLabel('Background Position Inner');
echo $form->text('bg_size_inner')->setLabel('Background Size Inner');
echo $form->text('Title');
echo $form->text('Welcome');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->editor('Description');
echo $form->toggle('bg_shadow')->setLabel('Shadow for Content');
echo $form->toggle('right')->setLabel('Shift Block Content to Right');
echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);