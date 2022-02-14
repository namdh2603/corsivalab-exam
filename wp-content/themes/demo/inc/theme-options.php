<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
$form = tr_form()->useJson()->setGroup($this->getName());
?>
<h1>Corsivalab Theme Options</h1>
<div class="typerocket-container">
    <?php
    echo $form->open();
    // Header
    $header = function () use ($form) {
        echo $form->image('Promotion Image');
        echo $form->text('Title');
        echo $form->text('Sub Title');
        echo $form->row([
            $form->text('title_link')->setLabel('Title Link'),
            $form->text('link')->setLabel('Link')
        ]);
    };
    $header_social = function () use ($form) {
        echo $form->repeater('Social List')->setFields([
            $form->row(
                $form->image('Icon'),
                $form->text('Link Icon'),
            ),
        ]);
    };
    //Footer
    $footer = function () use ($form) {
        echo $form->text('Copyright Footer');
        echo $form->repeater('Info Company')->setFields([
            $form->row([
                $form->image('Icon'),
                $form->textarea('Title'),
            ]),
        ]);
    };
    //General
    $general = function () use ($form) {
        echo $form->repeater('feature_item')->setLabel('Feature List')->setFields([
            $form->image('Icon'),
            $form->row(
                $form->text('Title'),
                $form->text('Description')
            )
        ]);
    };
    // Woocommerce
    $woocommerce = function () use ($form) {
        echo $form->text('Shop Title');
        echo $form->text('Shop Sub Title');
        echo $form->image('Shop Banner');
    };
    // Woocommerce
    $woocommerce2 = function () use ($form) {
        echo $form->links('Choose Product Upsell')->setPostType('product');
    };
    // Woocommerce
	    $woocommerce3 = function () use ($form) {
        echo $form->image('Thank you Banner');
        echo $form->text('Thank you Title');
    };
    // Save
    $save = $form->submit('Save');
    // Layout
    tr_tabs()->setSidebar($save)
        ->addTab('Header Promotion', $header)
        ->addTab('Header Social', $header_social)
        ->addTab('Footer', $footer)
        ->addTab('General', $general)
        ->addTab('Shop Banner', $woocommerce)
        ->addTab('Cart', $woocommerce2)
        ->addTab('Thank you page', $woocommerce3)
        ->render('box');
    echo $form->close();
    ?>
</div>