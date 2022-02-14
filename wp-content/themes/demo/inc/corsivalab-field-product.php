<?php
$addon_product = tr_meta_box('Product Addon Details');
$addon_product->addPostType('product');
$addon_product->setCallback(function(){
    $form = tr_form();

// 	echo $form->text('product_subname')->setLabel('Sub Product Name');
	
// 	echo $form->repeater('Tag Label Item')->setFields([
// 		$form->text('Label Name'),
// 		$form->color('Label Color')->setPalette([
// 			'#CCCCCC',
// 			'#000000',
// 			'#FFFFFF'
// 		]),
// 		$form->color('Background')->setPalette([
// 			'#CCCCCC',
// 			'#da5173',
// 			'#ffd0d6',
// 			'#d2e5f4',
// 			'#a40021'
// 		])
// 	]);

		echo $form->editor('benefits')->setLabel('Key Benefits Tab Content');
	
	
// 	echo $form->repeater('Key Benefits Tab')->setFields([
// 	]);

	//echo $form->text('product_description_cat')->setLabel('Description for Product Category');



});