<h1>About Mission</h1>
<?php
echo $form->image('Background');
echo $form->text('Title');
echo $form->editor('Description');
echo $form->text('Text Button');
echo $form->text('Link Button');


echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);