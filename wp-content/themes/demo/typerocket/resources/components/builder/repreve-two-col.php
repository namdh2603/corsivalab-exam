<h1> Repreve 2 Cols </h1>
<?php
    echo $form->repeater('List')->setFields([
        $form->text('Title'),
        $form->editor('Description'),
        $form->image('Thumbnail'),
        $form->toggle('Text Top')
    ]);