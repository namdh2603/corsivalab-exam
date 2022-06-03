<h1>FAQs</h1>
<?php
    echo $form->image('Background');
    echo $form->text('Title');
    echo $form->repeater('List')->setFields([
        $form->text('Title'),
        $form->repeater('Faqs List')->setFields([
            $form->text('Title'),
            $form->editor('Description')
        ])
    ]);
