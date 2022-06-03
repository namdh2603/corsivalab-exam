<h1>Home About</h1>
<?php
echo $form->color('bg_color_section')->setLabel('Background Section');
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
echo $form->text('Title');
// echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->select('style_font')->setLabel('Choose Font')->setOptions($options_font)->setSetting('default', 'default-font');
echo $form->select('style_btn')->setLabel('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'btn-default');
echo $form->image('Thumbnail');
echo $form->editor('Description');
echo $form->text('Text Button');
echo $form->text('Link Button');
echo $form->image('Banner');
echo $form->toggle('Reverse');
echo $form->toggle('Reverse Mobile');
$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);