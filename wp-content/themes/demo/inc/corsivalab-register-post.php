<?php
// $new_post = tr_post_type('Award', 'Awards'); //menu show option right
// $new_post->setId('award');
// $new_post->setTitlePlaceholder('Enter award name here...');
// //$new_post->setIcon('book');
// //$new_post->setArchivePostsPerPage(5);
// $new_post->setSupports(['title', 'editor', 'thumbnail','author']);


$argsSupport = array( 'title','thumbnail','editor','excerpt');
$portfolio = tr_post_type('Portfolios', 'Portfolio');
$portfolio->setSupports($argsSupport);
$portfolio->setTitlePlaceholder('Enter title in here');
$portfolio->setRest();
$portfolio->setArchivePostsPerPage(-1);

$categories = tr_taxonomy('Category Portfolio', 'Categories Portfolio');
$categories->setHierarchical();


$portfolio->apply($categories);


tr_meta_box('Portfolio Infomation')->apply($portfolio)->setCallback(function () {
    $form = tr_form();
    echo $form->gallery('Gallery');
    // echo $form->repeater('Project Scope')->setFields([
    //     $form->text('Title'),
    // ]);
    // echo $form->textarea('Video')->setLabel('Link Video');

});