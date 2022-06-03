<h1>Why Breathable</h1>
<?php
    echo $form->image('Big Thumbnail');
    echo $form->text('Title');
    echo $form->editor('Description');
    echo $form->image('Small Thumbnail Top');
    echo $form->image('Small Thumbnail Back');
    echo $form->toggle('Reverse');
echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);