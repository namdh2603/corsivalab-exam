<h1>Home Collections Big</h1>
<?php
echo $form->image('Background');
echo $form->text('Title');
echo $form->editor('Description');
echo $form->repeater('List')->setFields([
    $form->image('Background'),
    $form->text('Title'),
    $form->editor('Description'),
    $form->text('Text Button'),
    $form->text('Link Button'),
]);
