<h1>Why Bamboo Inovation</h1>
<?php
echo $form->text('Title');
echo $form->editor('Description');
echo $form->image('Background');
echo $form->repeater('List')->setFields([
     $form->text('Title'),
     $form->editor('Short Description'),
     $form->toggle('Text Top'),
     $form->image('Thumbnail')
]);