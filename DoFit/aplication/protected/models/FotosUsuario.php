<?php

/**
 * This is the model class for table "fotos_usuario".
 *
 * The followings are the available columns in table 'fotos_usuario':
 * @property integer $id_file
 * @property string $file_name
 * @property string $file_type
 * @property integer $file_size
 * @property string $file_content
 * @property integer $id_usuario
 */
class FotosUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fotos_usuario';
	}

	public $fotosUsuario;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
	
			return array(
				array('fotosUsuario', 'file', 'types'=>'jpg, gif, png'),
			);
		
 
	/*	return array(
			array('file_name, file_type, file_size, file_content, id_usuario', 'required'),
			array('file_size, id_usuario', 'numerical', 'integerOnly'=>true),
			array('file_name', 'length', 'max'=>60),
			array('file_type', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_file, file_name, file_type, file_size, file_content, id_usuario', 'safe', 'on'=>'search'),
		);*/
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_file' => 'Id File',
			'file_name' => 'File Name',
			'file_type' => 'File Type',
			'file_size' => 'File Size',
			'file_content' => 'File Content',
			'id_usuario' => 'Id Usuario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_file',$this->id_file);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('file_type',$this->file_type,true);
		$criteria->compare('file_size',$this->file_size);
		$criteria->compare('file_content',$this->file_content,true);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FotosUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
    {
        if($file=CUploadedFile::getInstance($this,'fotosUsuario'))
        {
            $this->file_name=$file->name;
            $this->file_type=$file->type;
            $this->file_size=$file->size;
            $this->file_content=file_get_contents($file->tempName);
        }
 
    return parent::beforeSave();
    }
	
}
