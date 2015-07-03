<?php
 
 
return array(
    'title' => 'Upload your image',
 
    'attributes' => array(
        'enctype' => 'multipart/form-data',
    ),
 
    'elements' => array(
        'image' => array(
            'type' => 'file',
        ),
    ),
 
    'buttons' => array(
        'reset' => array(
            'type' => 'reset',
            'label' => 'Reset',
        ),
        'submit' => array(
            'type' => 'submit',
            'label' => 'Upload',
        ),
    ),
);


?>
