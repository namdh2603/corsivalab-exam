<h1>Rewards Banner</h1>
<?php
echo $form->image('Banner');
echo $form->text('Title');
	$options = [
	'Default' => 'default',
	'Carolissa' => 'carolissa',
	'Cherlotte' => 'cherlotte'
	];
echo $form->radio('Choose Font')->setOptions($options)->setSetting('default', 'default');
echo $form->editor('Description');
echo $form->toggle('title_color')->setLabel('Active white color Title');
echo $form->toggle('title_shadow')->setLabel('Active shadow Title');
echo $form->toggle('text_color')->setLabel('Active white color Description');
echo $form->row(
        $form->text('Padding Top')->setType('number')->setHelp('rem'),
        $form->text('Padding Bottom')->setType('number')->setHelp('rem'),
        $form->text('Padding Left')->setType('number')->setHelp('rem'),
        $form->text('Padding Right')->setType('number')->setHelp('rem'),
    );