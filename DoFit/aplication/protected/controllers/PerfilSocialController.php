<?php

class PerfilSocialController extends Controller
{

	public $layout='//layouts/column2';
/*
	public function accessRules()
	{
		return array(
			array('deny',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('indexA','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

	/*
	public function findPerfilByUserId(){

	  $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	  $perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		
	}
	*/


    public function actionIndex(){
		
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));

		if($model == null){ // se crea un nuevo perfil social si el usuario es nuevo
			$model = new PerfilSocial();
			$model->id_usuario=$Us->id_usuario;
			$model->fhcreacion= new CDbExpression('NOW()');
			$model->cusuario=$Us->id_usuario;
			$model->save();
		}
	
		$this->render('index',array(
			'model'=>$model,
			'Us'=>$Us,
			'fichaUsuario'=>$fichaUsuario,
			'localidad'=>$localidad,
		));	
    }
	
	public function actionEdicion(){
		
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		$fuModel= new FileUpload();//modelo que permite subir archivos de imagen
		
		if($model == null){ // se crea un nuevo perfil social si el usuario nuevo
			$model = new PerfilSocial();
			$model->id_usuario=$Us->id_usuario;
			$model->fhcreacion= new CDbExpression('NOW()');
			$model->cusuario=$Us->id_usuario;
			$model->save();
		}

		$this->render('edicion',array(
			'model'=>$model,
			'fuModel'=>$fuModel,
			'Us'=>$Us,
			'fichaUsuario'=>$fichaUsuario,
			'localidad'=>$localidad
		));	
	
	}
	
	public function actionEdicionInfo(){
		
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$this->render('edicionInfo',array(
			'model'=>$model
		));	
	}
	
	
	public function actionInformacion(){
		
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		
		
		if($model == null){ // se crea un nuevo perfil social si el usuario nuevo
			$model = new PerfilSocial();
			$model->id_usuario=$Us->id_usuario;
			$model->fhcreacion= new CDbExpression('NOW()');
			$model->cusuario=$Us->id_usuario;
			$model->save();
		}
	
	
		$this->render('informacion',array(
			'model'=>$model,
			'Us'=>$Us,
			'fichaUsuario'=>$fichaUsuario,
			'localidad'=>$localidad
		));	
	
	}

	
	public function actionSaveInfo(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		
		if(isset($_POST['descripcion'])){
			$perfilSocial->descripcion = $_POST['descripcion'];
			$perfilSocial->save();
		}
		
		echo $perfilSocial->descripcion;
	}

	public function actionSaveImagen(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$nombreImagen=$_POST['data'];
		
		$flag = 0;
		if($perfilSocial->foto1 == null && $flag!=1){
			$perfilSocial->foto1 = $nombreImagen;
			$flag = 1;
			
		}
		if($perfilSocial->foto2 == null && $flag!=1){
			$perfilSocial->foto2 = $nombreImagen;
			$flag = 1;
		}
		if($perfilSocial->foto3 == null && $flag!=1){
			$perfilSocial->foto3 = $nombreImagen;
			$flag = 1;
		}
		if($perfilSocial->foto4 == null && $flag!=1){
			$perfilSocial->foto4 = $nombreImagen;
			$flag = 1;
		}
		if($perfilSocial->foto5 == null && $flag!=1){
			$perfilSocial->foto5 = $nombreImagen;
			$flag = 1;
		}
		if($perfilSocial->foto6 == null && $flag!=1){
			$perfilSocial->foto6 = $nombreImagen;
			$flag = 1;
		}
		//echo $nombreImagen;
		
		$perfilSocial->update();
		echo "grabado";
		/*
		if($perfilSocial->update()){
			echo "grabado";
		}else{
			echo "error";
		}
		*/
	
	/*	if(isset($_POST['descripcion'])){
			$perfilSocial->descripcion = $_POST['descripcion'];
			$perfilSocial->save();
		}
		*/
		/*echo $perfilSocial->descripcion;*/
	}

	
	public function actionGaleria(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fuModel= new FileUpload();//modelo que permite subir archivos de imagen	
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));

		
		/*carga de div de confirmacion vacia*/
		
        $myValue = "Content loaded";
	
		$this->render('galeria',array(
		'Us'=>$Us,
		'perfilSocial'=>$perfilSocial
		));	
	}
	
	public function actionDeleteImagen(){
			$Us = Usuario::model()->findByPk(Yii::app()->user->id);
			$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
			$id = $_POST['id'];	
			
			if($id != null && $id != ""){
		
				$foto = "foto".$id;
				$perfilSocial->$foto =	new CDbExpression('NULL');
				$perfilSocial->update();
			}
	}
	
	public function actionMostrarImagenes(){
			$Us = Usuario::model()->findByPk(Yii::app()->user->id);
			$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
			$this->render('_imagenes',array(
				'Us'=>$Us,
				'perfilSocial'=>$perfilSocial
			));	
	}
	
	


}