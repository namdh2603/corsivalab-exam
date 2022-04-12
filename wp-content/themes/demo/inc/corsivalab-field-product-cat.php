<?php
function product_cat_taxonomy()
{
	$product_cat = tr_taxonomy('product_cat');
	$product_cat->setMainForm(function () {
		$form = tr_form();
		echo $form->image('banner');
		echo $form->textarea('Content');
		echo $form->text('Button');

		echo $form->repeater('Content post')->setFields([
			$form->image('Image Post '),
			$form->text('Title Post'),
			$form->editor('Description'),
			$form->text('Link post')
		]);
	});
	$product_cat->register();
}
add_action('init', 'product_cat_taxonomy',11);


//Example 1: using addPostType()
$pub = tr_taxonomy('Publisher', 'Publishers');
$pub->addPostType('product');
$pub->setHierarchical();
$pub->setSlug('publishers');
$pub->setId('book_publisher');


$pub->setMainForm(function() {
    $form = tr_form();
    echo $form->text('Company');
});




// Example 2: Using apply()

// $pub = tr_taxonomy('Publisher', 'Publishers');
// $product = tr_post_type('product');
// $pub->apply($book);