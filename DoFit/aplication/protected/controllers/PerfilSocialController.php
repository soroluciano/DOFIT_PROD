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
		
		$isnull=false;
		$foto;
		$fotoSave;
		for($i=1;$i<=6;$i++){
			$foto = "foto".$i;
			$nombre =	$perfilSocial->$foto;
			if($nombre==null && $isnull != true){
				$fotoSave = "foto".$i;
				$isnull = true;
			}
		}
		
		$perfilSocial->$fotoSave = $nombreImagen;		
		$perfilSocial->update();
		echo "grabado";

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
	
	public function actionGetContactos(){
		$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
        $contactos = Yii::app()->db->createCommand("select distinct (id_usuario) from actividad_alumno acal where acal.id_actividad in (select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and  aa.id_usuario = ".$usuario->id_usuario." or a.id_usuario =".$usuario->id_usuario.")")->queryAll();
		$this->renderPartial('_contactos',array('contactos'=>$contactos,'usuario'=>$usuario));
	}
	
    public function actionAmigo(){
      $id=$_POST['id'];
      $this->render('_amigo',array('id'=>$id));
    }
    


}