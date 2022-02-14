<?php
$new_post = tr_post_type('Award', 'Awards'); //menu show option right
$new_post->setId('award');
$new_post->setTitlePlaceholder('Enter award name here...');
//$new_post->setIcon('book');
//$new_post->setArchivePostsPerPage(5);
$new_post->setSupports(['title', 'editor', 'thumbnail','author']);