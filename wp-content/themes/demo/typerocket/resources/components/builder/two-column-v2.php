<h1>Two Column V2</h1>
<?php
$options_btn = [
	'Default' => 'btn-default',
	'Button layout 1' => 'btn-layout-1',
	'Button layout 2' => 'btn-layout-2'
];
echo $form->toggle('White Section');
echo $form->image('img')->setLabel('Banner');
echo $form->color('bg_color')->setLabel('Background Color');
echo $form->text('sub')->setLabel('Sub Title');
echo $form->text('title')->setLabel('Title');
echo $form->editor('desc')->setLabel('Description');
echo $form->row(
    $form->text('btn_txt')->setLabel('Text Button'),
    $form->text('btn_link')->setLabel('Link Button')->setDefault('#'),
);

echo $form->toggle('White Section 2');
echo $form->image('img_2')->setLabel('Banner 2');
echo $form->color('bg_color_2')->setLabel('Background Color 2');
// echo $form->color('bg_color_section')->setLabel('Background Section');
echo $form->text('sub_2')->setLabel('Sub Title');
echo $form->text('title_2')->setLabel('Title 2');
echo $form->editor('desc_2')->setLabel('Description 2');
echo $form->row(
    $form->text('btn_txt_2')->setLabel('Text Button 2'),
    $form->text('btn_link_2')->setLabel('Link Button 2')->setDefault('#'),
);

$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);