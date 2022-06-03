<h1>Home Collections Big</h1>
<?php
echo $form->color('bg_color_section')->setLabel('Background Section');
echo $form->image('Background');
echo $form->text('Title');
echo $form->editor('Description');
$options = [
	'Default' => 'default',
	'Button layout 1' => 'layout-1',
	'Button layout 2' => 'layout-2'
];
echo $form->radio('Choose Button Layout')->setOptions($options)->setSetting('default', 'default');
echo $form->repeater('List')->setFields([
    $form->image('Background'),
    $form->text('Title'),
    $form->editor('Description'),
    $form->text('Text Button'),
    $form->text('Link Button'),
]);
$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);