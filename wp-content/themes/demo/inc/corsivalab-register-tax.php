<?php
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