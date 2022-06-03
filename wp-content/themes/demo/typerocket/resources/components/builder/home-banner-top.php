<h1>Home Banner Top</h1>
<?php
echo $form->toggle('Fit Content');
echo $form->repeater('List')->setFields([
    $form->image('Background'),
    $form->text('Title'),
    $form->editor('Description'),
    $form->text('Button'),
    $form->text('Link Button'),
]);

