<h1>Contact Us Form</h1>
<?php
    $arr_cf7 = get_ct7();
    $arr_sci = get_sci_icon();
    $tab_title = function () use ($form) {
        echo $form->image('Background');
        echo $form->text('Title');
        echo $form->editor('Description');
        echo $form->text('Address Title');
    };
    $tab_form = function () use ($form, $arr_cf7) {
        echo $form->select('Contact Form 7')->setOptions($arr_cf7);
    };
    $tab_contact = function () use ($form, $arr_sci) {
        echo $form->text('Phone Title');
        echo $form->repeater('Phone List')->setFields([
            $form->text('Phone Number')
        ]);
        echo $form->text('Mail Title');
        echo $form->repeater('Mail List')->setFields([
            $form->text('Mail Address')
        ]);
        echo $form->text('Infor Title');
        echo $form->repeater('Icon List')->setFields([
            //$form->select('Social Icon')->setOptions($arr_sci),
			
            $form->image('Icon'),
          //  $form->color('Color'),
            $form->text('Link')
        ]);        
    };

    $tab_address = function () use ($form) {
        echo $form->text('Address Title');
        echo $form->repeater('Address List')->setFields([
            $form->text('Title'),
            $form->editor('Description')
        ]);
    };
    
    tr_tabs()
        ->addTab('Main Title' , $tab_title)
        ->addTab('Contact Form', $tab_form)
        ->addTab('Contact Infor', $tab_contact)
        ->addTab('Address Infor', $tab_address)
        ->render('tab');