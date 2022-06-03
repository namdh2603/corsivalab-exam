<h1>Home Instagram</h1>
<?php
$options_font = [
	'Default' => 'default-font',
	'Carolissa' => 'carolissa-font',
	'Cherlotte' => 'cherlotte-font'
];
echo $form->color('bg_color_section')->setLabel('Background Section');
echo $form->text('Title');
echo $form->select('style_font')->setLabel('Title Font')->setOptions($options_font)->setSetting('default', 'default-font');
echo $form->text('Instagram Shortcode');
$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);