<h1>Home Banner Carousel</h1>
<?php
echo $form->repeater('List')->setFields([
    $form->image('Background'),
    $form->text('Title'),
    $form->editor('Description'),
	$form->row(
		$form->text('Button'),
		$form->text('Link Button')
	)
]);

