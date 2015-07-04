<?php

/**
 * This is the model class for table "ficha_usuario".
 *
 * The followings are the available columns in table 'ficha_usuario':
 * @property integer $id_ficha
 * @property integer $id_usuario
 * @property string $dni
 * @property string $sexo
 * @property string $fechanac
 * @property string $telfijo
 * @property string $celular
 * @property string $conemer
 * @property string $telemer
 * @property integer $id_localidad
 * @property string $direccion
 * @property string $piso
 * @property string $depto
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property Localidad $idLocalidad
 * @property Usuario $idUsuario
 */
class FichaUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()	
	{
		return 'ficha_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellido, dni, sexo', 'required','message'=>'Ingrese un {attribute}'),
			array('fechanac, direccion, fhcreacion, cusuario', 'required','message'=>'Ingrese una {attribute}'),
			array('id_usuario, id_localidad', 'numerical', 'integerOnly'=>true),
			array('id_localidad','required','message'=>'Seleccione una localidad'),
			array('conemer, direccion, cusuario', 'length', 'max'=>60),
			array('dni', 'length', 'max'=>8),
			array('dni','unique','className'=>'FichaUsuario','attributeName'=>'dni','message'=>'El dni ya se encuentra registrado'),
		    //array('sexo', 'length', 'max'=>1,'message'=>'Seleccione un sexo'),
			array('telfijo, celular, telemer', 'length', 'max'=>30),
			array('telfijo, celular, telemer, dni', 'numerical', 'integerOnly'=>true, 'message'=>'El dato debe ser númerico'),
			array('piso, depto', 'length', 'max'=>10),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ficha, id_usuario, nombre, apellido, dni, sexo, fechanac, telfijo, celular, conemer, telemer, id_localidad, direccion, piso, depto, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
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
			'idLocalidad' => array(self::BELONGS_TO, 'Localidad', 'id_localidad'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ficha' => 'Id Ficha',
			'id_usuario' => 'Id Usuario',
			'nombre'=>'Nombre',
			'apellido'=>'Apellido',
			'dni' => 'Dni',
			'sexo' => 'Sexo',
			'fechanac' => 'Fecha nacimiento',
			'telfijo' => 'Teléfono fijo',
			'celular' => 'Celular',
			'conemer' => 'Contacto emergencia',
			'telemer' => 'Teléfono emergencia',
			'id_localidad' => 'Localidad',
			'direccion' => 'Direccion',
			'piso' => 'Piso',
			'depto' => 'Depto',
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

		$criteria->compare('id_ficha',$this->id_ficha);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre);
		$criteria->compare('apellido',$this->apellido);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fechanac',$this->fechanac,true);
		$criteria->compare('telfijo',$this->telfijo,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('conemer',$this->conemer,true);
		$criteria->compare('telemer',$this->telemer,true);
		$criteria->compare('id_localidad',$this->id_localidad);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('piso',$this->piso,true);
		$criteria->compare('depto',$this->depto,true);
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
	 * @return FichaUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
