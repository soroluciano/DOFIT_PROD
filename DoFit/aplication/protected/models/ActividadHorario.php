<?php

/**
 * This is the model class for table "actividad_horario".
 *
 * The followings are the available columns in table 'actividad_horario':
 * @property integer $id_actividad
 * @property integer $id_dia
 * @property integer $hora
 * @property integer $minutos
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property Actividad $idActividad
 */
class ActividadHorario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actividad_horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_actividad, id_dia, hora, minutos, fhcreacion, cusuario', 'required'),
			array('id_actividad, id_dia, hora, minutos', 'numerical', 'integerOnly'=>true),
			array('cusuario', 'length', 'max'=>60),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_actividad, id_dia, hora, minutos, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
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
			'idActividad' => array(self::BELONGS_TO, 'Actividad', 'id_actividad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_actividad' => 'Id Actividad',
			'id_dia' => 'Id Dia',
			'hora' => 'Hora',
			'minutos' => 'Minutos',
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

		$criteria->compare('id_actividad',$this->id_actividad);
		$criteria->compare('id_dia',$this->id_dia);
		$criteria->compare('hora',$this->hora);
		$criteria->compare('minutos',$this->minutos);
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
	 * @return ActividadHorario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
