<h1>Why Bamboo Plant To Product</h1>
<?php
    echo $form->text('Title');
    echo $form->editor('Description');
    echo $form->image('Background');
    echo $form->repeater('List')->setFields([
        $form->text('Title'),
        $form->editor('Description'),
        $form->image('Thumbnail')
    ]);