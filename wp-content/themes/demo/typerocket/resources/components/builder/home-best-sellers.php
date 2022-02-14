<h1>Home Best Seller</h1>
<?php
echo $form->image('Main Background');
echo $form->text('Title');
echo $form->image('Background')->setLabel('Left Image');
$arr_cats = get_product_cat();
echo $form->select('Category')->setOptions($arr_cats);