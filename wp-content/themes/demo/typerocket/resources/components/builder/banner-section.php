<h1>Banner Section</h1>
<?php
$options_btn = [
	'Default' => 'default',
	'Button layout 1' => 'layout-1',
	'Button layout 2' => 'layout-2'
];
$options_font = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->image('img')->setLabel('Banner Image');
echo $form->text('Title');
echo $form->radio('Choose Font')->setOptions($options_font)->setSetting('default', 'default');
echo $form->editor('Description');
echo $form->row(
	$form->text('Button'),
	$form->text('Link Button')
);
echo $form->radio('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'default');
// echo $form->repeater('List')->setFields([
//     $form->image('Background'),
//     $form->text('Title'),
// 	$options = [
// 	'Default' => 'default',
// 	'Carolissa' => 'carolissa',
// 	'Cherlotte' => 'cherlotte'
// 	],
// 	$form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default'),
//     $form->editor('Description'),
// 	$form->row(
// 		$form->text('Button'),
// 		$form->text('Link Button')
// 	)
// ]);
echo $form->toggle('Section Padding');
echo $form->toggle('title_color')->setLabel('Active white color Title');
echo $form->toggle('title_shadow')->setLabel('Active shadow Title');
echo $form->toggle('text_color')->setLabel('Active white color Description');
echo $form->toggle('bg_darken')->setLabel('Active darken Background');