<h1>Home New Arrivals</h1>
<?php
echo $form->text('Title');
echo $form->editor('Description');
echo $form->repeater('List')->setFields([
    $form->search('Product Name')->setPostType('product')
]);