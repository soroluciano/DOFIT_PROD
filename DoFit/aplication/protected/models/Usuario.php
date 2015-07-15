<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property string $email
 * @property string $password
 * @property integer $id_perfil
 * @property integer $id_estado
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property Actividad[] $actividads
 * @property FichaUsuario[] $fichaUsuarios
 * @property PerfilSocial $perfilSocial
 * @property Institucion[] $institucions
 * @property Respuesta[] $respuestas
 * @property Estado $idEstado
 * @property Perfil $idPerfil
 */
class Usuario extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, fhcreacion, cusuario', 'required','message'=>'Ingrese un {attribute}'),
			array('email, password, id_estado, fhcreacion, cusuario', 'required','message'=>'Ingrese un dato en el campo {attribute}'),
			array('id_perfil', 'required', 'message'=>'Seleccione un perfil'),
			array('id_perfil, id_estado', 'numerical', 'integerOnly'=>true),
			array('email, cusuario', 'length', 'max'=>60),
			array('email','email','message'=>'Ingrese una dirección de correo válida'),
			array('password', 'validarexpregContraseña'),
			array('email','unique','className'=>'Usuario','attributeName'=>'email','message'=>'El mail ya se encuentra registrado'),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, email, password, id_perfil, id_estado, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
		);
	}

	public function validarexpregContraseña($attribute,$params)
	{
	  $expr_regular = "^(?=.*\d{2})(?=.*[A-Z]).{0,20}$^";
	  $password = $this->password;

	  if(strlen($password) < 6  || strlen($password) > 15){
	  $this->addError('password','La contraseña debe tener entre 6 y 15 caracteres');
	  }

	  if(!preg_match($expr_regular,$password)){
		  $this->addError('password',' La contraseña debe tener al menos una mayúscula y dos números');
	  }


	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actividads' => array(self::MANY_MANY, 'Actividad', 'actividad_alumno(id_usuario, id_actividad)'),
			'fichaUsuarios' => array(self::HAS_MANY, 'FichaUsuario', 'id_usuario'),
			'perfilSocial' => array(self::HAS_ONE, 'PerfilSocial', 'id_usuario'),
			'institucions' => array(self::MANY_MANY, 'Institucion', 'profesor_institucion(id_usuario, id_institucion)'),
			'respuestas' => array(self::HAS_MANY, 'Respuesta', 'id_usuario'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idPerfil' => array(self::BELONGS_TO, 'Perfil', 'id_perfil'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Usuario',
			'email' => 'Email',
			'password' => 'Password',
			'id_perfil' => 'Perfil',
			'id_estado' => 'Id Estado',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('id_perfil',$this->id_perfil);
		$criteria->compare('id_estado',$this->id_estado);
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
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
