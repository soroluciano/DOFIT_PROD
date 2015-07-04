
<?php
 
class FileUpload extends CFormModel {
 
    public $foto;
 
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            //note you wont need a safe rule here
            array('foto', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, gif, png'),
        );
    }
 
	/* public function attributeLabels(){
		return array(
                        'foto'=>'Foto',			
		);
	}*/
 
}

?>
