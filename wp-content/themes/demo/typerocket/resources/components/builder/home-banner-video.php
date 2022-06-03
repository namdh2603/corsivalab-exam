<h1>Home Banner Video</h1>
<?php
echo $form->file('Video File')->setSetting('type', 'video');
 echo    $form->text('Title');
echo $form->editor('Description');
echo $form->row(
	$form->text('Button'),
	$form->text('Link Button'),
);