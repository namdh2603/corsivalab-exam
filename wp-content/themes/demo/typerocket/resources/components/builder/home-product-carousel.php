<h1>Home Product Carousel</h1>
<?php
echo $form->color('bg_color_section')->setLabel('Background Section');
echo $form->text('Title');
echo $form->links('Choose Product List')->setPostType('product');
$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);