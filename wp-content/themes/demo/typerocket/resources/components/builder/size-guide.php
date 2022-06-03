<h1>Size Guide</h1>
<?php
        echo $form->repeater('List')->setFields([
            $form->search('Search')->setTaxonomy('category')
        ]);