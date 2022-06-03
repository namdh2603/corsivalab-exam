<h1>Landing Content</h1>
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






echo $form->image('Background');
echo $form->text('Title Left');
echo $form->select('style_font')->setLabel('Choose Font')->setOptions($options_font)->setSetting('default', 'default-font');
// echo $form->select('style_btn')->setLabel('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'btn-default');
echo $form->text('Description Left');
echo $form->text('Title Right');
echo $form->select('style_font_2')->setLabel('Choose Font')->setOptions($options_font)->setSetting('default', 'default-font');
// echo $form->select('style_btn')->setLabel('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'btn-default');
echo $form->editor('Sub Title Right');
echo $form->text('Description Right');
echo $form->text('Shortcode countdown');
echo $form->text('Shortcode Register');