<h1>Remove Ocean Plastic</h1>
<?php
echo $form->image('img')->setLabel('Image');
echo $form->text('Title');
$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
];
echo $form->toggle('title_color')->setLabel('Active white color Title');


echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');






   echo $form->row(
        $form->column(
            $form->image('img_1')->setLabel('Image 1'),
        ),
        $form->column(
            $form->text('Title 1'),
            $form->text('Description 1'),
			),
	   );

   echo $form->row(
        $form->column(
            $form->image('img_2')->setLabel('Image 2'),
        ),
        $form->column(
            $form->text('Title 2'),
            $form->text('Description 2'),
			),
	   );












    echo $form->row(
        $form->text('Padding Top')->setType('number')->setHelp('rem'),
        $form->text('Padding Bottom')->setType('number')->setHelp('rem'),
        $form->text('Padding Left')->setType('number')->setHelp('rem'),
        $form->text('Padding Right')->setType('number')->setHelp('rem'),
    );