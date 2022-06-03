<h1>Home Banner Video Style 2</h1>
<?php
echo $form->file('Video File')->setSetting('type', 'video');
echo $form->text('Title');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');

echo $form->toggle('title_shadow')->setLabel('Active shadow Title');