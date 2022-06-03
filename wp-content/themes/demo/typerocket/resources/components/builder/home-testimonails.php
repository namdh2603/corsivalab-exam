<h1>Testimonails</h1>
<?php
    echo $form->text('Title');
    echo $form->image('Background');
    echo $form->text('Number comments')->settype('Number');
echo $form->repeater('List')->setFields([
    $form->text('Title'),
    $form->text('Name'),
]);
