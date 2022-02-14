<h1>Repreve 3 Cols</h1>
<?php
    echo $form->text('Title');
    echo $form->image('Background');
    echo $form->repeater('List')->setFields([
        $form->image('Thumbnail'),
        $form->text('Title'),
        $form->row(
            $form->text('Text Button'),
            $form->text('Link Button')
        )
    ]);