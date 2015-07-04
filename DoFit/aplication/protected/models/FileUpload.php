
<?php
 
class FileUpload extends CFormModel {
 
    public $image;
 
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            //note you wont need a safe rule here
            array('image', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, gif, png'),
        );
    }
 
}

?>
