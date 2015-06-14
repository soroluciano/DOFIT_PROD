<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property integer $id_actividad
 * @property integer $id_deporte
 * @property integer $id_institucion
 * @property integer $id_usuario
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property Deporte $idDeporte
 * @property ProfesorInstitucion $idUsuario
 * @property ProfesorInstitucion $idInstitucion
 * @property Usuario[] $usuarios
 * @property ActividadHorario[] $actividadHorarios
 * @property PerfilMuroProfesor[] $perfilMuroProfesors
 */
class Actividad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_deporte, id_institucion, id_usuario, fhcreacion, cusuario', 'required'),
			array('id_deporte, id_institucion, id_usuario', 'numerical', 'integerOnly'=>true),
			array('cusuario', 'length', 'max'=>60),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_actividad, id_deporte, id_institucion, id_usuario, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
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
			'idDeporte' => array(self::BELONGS_TO, 'Deporte', 'id_deporte'),
			'idUsuario' => array(self::BELONGS_TO, 'ProfesorInstitucion', 'id_usuario'),
			'idInstitucion' => array(self::BELONGS_TO, 'ProfesorInstitucion', 'id_institucion'),
			'usuarios' => array(self::MANY_MANY, 'Usuario', 'actividad_alumno(id_actividad, id_usuario)'),
			'actividadHorarios' => array(self::HAS_MANY, 'ActividadHorario', 'id_actividad'),
			'perfilMuroProfesors' => array(self::HAS_MANY, 'PerfilMuroProfesor', 'id_actividad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_actividad' => 'Id Actividad',
			'id_deporte' => 'Id Deporte',
			'id_institucion' => 'Id Institucion',
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

		$criteria->compare('id_actividad',$this->id_actividad);
		$criteria->compare('id_deporte',$this->id_deporte);
		$criteria->compare('id_institucion',$this->id_institucion);
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
	 * @return Actividad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
