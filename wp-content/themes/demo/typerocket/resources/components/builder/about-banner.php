<h1>About Banner</h1>
<?php
    echo $form->image('Banner');

    echo $form->row(
        $form->text('Padding Top')->setType('number'),
        $form->text('Padding Bottom')->setType('number'),
        $form->text('Padding Left')->setType('number'),
        $form->text('Padding Right')->setType('number'),
    );