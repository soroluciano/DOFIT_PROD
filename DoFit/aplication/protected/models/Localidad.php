<?php

/**
 * This is the model class for table "localidad".
 *
 * The followings are the available columns in table 'localidad':
 * @property integer $id_localidad
 * @property string $localidad
 * @property integer $id_provincia
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property FichaInstitucion[] $fichaInstitucions
 * @property FichaUsuario[] $fichaUsuarios
 * @property Provincia $idProvincia
 */
class Localidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'localidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('localidad, id_provincia, fhcreacion, cusuario', 'required'),
			array('id_provincia', 'numerical', 'integerOnly'=>true),
			array('localidad, cusuario', 'length', 'max'=>60),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_localidad, localidad, id_provincia, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'fichaInstitucions' => array(self::HAS_MANY, 'FichaInstitucion', 'id_localidad'),
			'fichaUsuarios' => array(self::HAS_MANY, 'FichaUsuario', 'id_localidad'),
			'idProvincia' => array(self::BELONGS_TO, 'Provincia', 'id_provincia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_localidad' => 'Id Localidad',
			'localidad' => 'Localidad',
			'id_provincia' => 'Id Provincia',
			'fhcreacion' => 'Fhcreacion',
			'fhultmod' => 'Fhultmod',
			'cusuario' => 'Cusuario',
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

		$criteria->compare('id_localidad',$this->id_localidad);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('id_provincia',$this->id_provincia);
		$criteria->compare('fhcreacion',$this->fhcreacion,true);
		$criteria->compare('fhultmod',$this->fhultmod,true);
		$criteria->compare('cusuario',$this->cusuario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Localidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
