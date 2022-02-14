<h1>Background Image</h1>
<?php
    $arr_position = [
            'Top' => 'top',
            'Bottom' => 'bottom',
            'Left' => 'left',
            'Right' => 'right'];
    $arr_unit = ['px'=>'px','%'=>'%'];
    echo $form->toggle('Start form Bottom');
    echo $form->repeater('List')->setFields([
        $form->image('Background'),
        $form->text('Height')->setType('number')->setHelp('using px'),
        $form->repeater('Spacing')->setFields([
            $form->select('Direction')->setOptions($arr_position),
            $form->text('Value')->setType('number'),
            $form->select('Unit')->setOptions($arr_unit)
        ])
    ]);
