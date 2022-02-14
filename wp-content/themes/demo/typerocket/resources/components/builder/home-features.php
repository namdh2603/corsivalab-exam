<h1>Home Features</h1>
<?php
echo $form->image('Background');
echo $form->repeater('List')->setFields([
    $form->image('Icon'),
    $form->text('Title'),
    $form->editor('Description'),
]);
