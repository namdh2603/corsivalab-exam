<h1>Home Best Sellers 2</h1>
<?php
echo $form->image('Background');
echo $form->text('Background Position');
echo $form->text('Title');
echo $form->repeater('List')->setFields([
    $form->image('Thumbnail'),
    $form->row(
    $form->text('Title'),
        $form->text('Link Button')->setDefault('#'),
    )
]);