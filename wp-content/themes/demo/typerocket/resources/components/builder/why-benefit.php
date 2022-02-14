<h1>Why Bamboo Benefit</h1>
<?php
    echo $form->text('Title');
    echo $form->repeater('List')->setFields([
        $form->text('Title'),
        $form->editor('Description'),
        $form->image('Thumbnail')
    ]);