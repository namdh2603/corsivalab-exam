<h1>About Mask</h1>
<?php
echo $form->image('Background');
echo $form->repeater('List')->setFields([
    $form->text('Title'),
    $form->editor('Description'),
]);
