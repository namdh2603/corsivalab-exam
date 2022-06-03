<h1>Two Column</h1>
<?php
$options_btn = [
	'Default' => 'btn-default',
	'Button layout 1' => 'btn-layout-1',
	'Button layout 2' => 'btn-layout-2'
];
echo $form->toggle('Reverse');
echo $form->image('img')->setLabel('Banner');
echo $form->color('bg_color')->setLabel('Background Content');
echo $form->color('bg_color_section')->setLabel('Background Section');
echo $form->toggle('Content Center');
echo $form->text('Title');
echo $form->toggle('Cherlotte Font');
echo $form->editor('Description');
echo $form->row(
	$form->text('Text Button'),
	$form->text('Link Button')
);
echo $form->select('style_btn')->setLabel('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'btn-default');
$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);