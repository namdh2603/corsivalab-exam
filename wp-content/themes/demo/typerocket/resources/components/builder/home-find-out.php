<h1>Home Find Out About Us </h1>
<?php 
    echo $form->text('Title');
    echo $form->repeater('List')->setFields([
        $form->image('Thumbnail'),
        $form->text('Title'),
        $form->editor('Description'),
        $form->text('Text Button'),
        $form->text('Link Button')
    ]);