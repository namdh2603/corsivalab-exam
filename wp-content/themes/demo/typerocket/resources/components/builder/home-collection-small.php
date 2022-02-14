<h1>Home Collections Small</h1>
<?php
echo $form->text('Title');
echo $form->editor('Description');
echo $form->image('Background');
$arr_cats = get_product_cat();
echo $form->repeater('List')->setFields([
     $form->select('Category')->setOptions($arr_cats),
     $form->editor('Short Description'),
     $form->toggle('Text Top')
]);