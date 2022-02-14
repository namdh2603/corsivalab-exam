<h1>Why good</h1>
<?php
echo $form->text('Title');
echo $form->editor('Description');

echo $form->row(
    $form->text('Padding Top')->setType('number'),
    $form->text('Padding Bottom')->setType('number'),
    $form->text('Padding Left')->setType('number'),
    $form->text('Padding Right')->setType('number'),
);