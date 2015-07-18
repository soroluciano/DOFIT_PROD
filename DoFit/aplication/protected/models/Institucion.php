<?php
/**
 * This is the model class for table "institucion".
 *
 * The followings are the available columns in table 'institucion':
 * @property integer $id_institucion
 * @property string $email
 * @property string $password
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 *
 * The followings are the available model relations:
 * @property FichaInstitucion[] $fichaInstitucions
 * @property Usuario[] $usuarios
 */
class Institucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'institucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('email, password, fhcreacion, cusuario', 'required','message'=>'Ingrese {attribute}'),
			array('email, password, cusuario', 'length', 'max'=>60),
            array('email','email','message'=>'Ingrese una dirección de correo válida'),
            array('email','unique','className'=>'Institucion','attributeName'=>'email','message'=>'El email ya se encuentra registrado'),
			array('password', 'validarexpregContraseña'),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_institucion, email, password, fhcreacion, fhultmod, cusuario', 'safe', 'on'=>'search'),
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
			'fichaInstitucions' => array(self::HAS_MANY, 'FichaInstitucion', 'id_institucion'),
			'usuarios' => array(self::MANY_MANY, 'Usuario', 'profesor_institucion(id_institucion, id_usuario)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_institucion' => 'Id Institucion',
			'email' => 'Email',
			'password' => 'Password',
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

		$criteria->compare('id_institucion',$this->id_institucion);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
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
	 * @return Institucion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
