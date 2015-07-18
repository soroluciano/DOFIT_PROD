<?php

/**
 * This is the model class for table "perfil_social".
 *
 * The followings are the available columns in table 'perfil_social':
 * @property integer $id_usuario
 * @property string $foto1
 * @property string $foto2
 * @property string $foto3
 * @property string $foto4
 * @property string $foto5
 * @property string $descripcion
 * @property string $fhcreacion
 * @property string $fhultmod
 * @property string $cusuario
 * @property string $fotoPerfil
 * @property string $foto6
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 */
class PerfilSocial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'perfil_social';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, fhcreacion, cusuario', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('foto1, foto2, foto3, foto4, foto5, cusuario, fotoPerfil, foto6', 'length', 'max'=>60),
			array('descripcion', 'length', 'max'=>3000),
			array('fhultmod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, foto1, foto2, foto3, foto4, foto5, descripcion, fhcreacion, fhultmod, cusuario, fotoPerfil, foto6', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'foto1' => 'Foto1',
			'foto2' => 'Foto2',
			'foto3' => 'Foto3',
			'foto4' => 'Foto4',
			'foto5' => 'Foto5',
			'descripcion' => 'Descripcion',
			'fhcreacion' => 'Fhcreacion',
			'fhultmod' => 'Fhultmod',
			'cusuario' => 'Cusuario',
			'fotoPerfil' => 'Foto Perfil',
			'foto6' => 'Foto6',
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
		$criteria->compare('foto1',$this->foto1,true);
		$criteria->compare('foto2',$this->foto2,true);
		$criteria->compare('foto3',$this->foto3,true);
		$criteria->compare('foto4',$this->foto4,true);
		$criteria->compare('foto5',$this->foto5,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fhcreacion',$this->fhcreacion,true);
		$criteria->compare('fhultmod',$this->fhultmod,true);
		$criteria->compare('cusuario',$this->cusuario,true);
		$criteria->compare('fotoPerfil',$this->fotoPerfil,true);
		$criteria->compare('foto6',$this->foto6,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PerfilSocial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
