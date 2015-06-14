<?php

/**
 * This is the model class for table "respuesta".
 *
 * The followings are the available columns in table 'respuesta':
 * @property integer $id_posteo
 * @property integer $id_respuesta
 * @property string $respuesta
 * @property integer $id_usuario
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property PerfilMuroProfesor $idPosteo
 * @property Usuario $idUsuario
 */
class Respuesta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'respuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_posteo, id_respuesta, respuesta, id_usuario, fhcreacion, cusuario', 'required'),
			array('id_posteo, id_respuesta, id_usuario', 'numerical', 'integerOnly'=>true),
			array('respuesta', 'length', 'max'=>2000),
			array('cusuario', 'length', 'max'=>60),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_posteo, id_respuesta, respuesta, id_usuario, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
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
			'idPosteo' => array(self::BELONGS_TO, 'PerfilMuroProfesor', 'id_posteo'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_posteo' => 'Id Posteo',
			'id_respuesta' => 'Id Respuesta',
			'respuesta' => 'Respuesta',
			'id_usuario' => 'Id Usuario',
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

		$criteria->compare('id_posteo',$this->id_posteo);
		$criteria->compare('id_respuesta',$this->id_respuesta);
		$criteria->compare('respuesta',$this->respuesta,true);
		$criteria->compare('id_usuario',$this->id_usuario);
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
	 * @return Respuesta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
