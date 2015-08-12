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

		//Modelos utilizados
		//$model=new PerfilSocial;
		$fuModel= new FileUpload();//modelo que permite subir archivos de imagen
		
		 if(isset($_POST['FileUpload'])) 
            {                
                if(isset($_FILES) and $_FILES['FileUpload']['error']['foto']==0)
                 {
                    $uf = CUploadedFile::getInstance($fuModel, 'foto');
                    if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
                        $uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
                    {
                          $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
						  if($model->foto1!=null){
							$model->foto1 = $uf->getName();
							$model->update();
						
						  }else{
							$model->foto1 = $uf->getName();
							$model->save();
						
						  }
						  
                          Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
                          Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
                          $this->refresh();
                    }else{
                        Yii::app()->user->setFlash('error_imagen','Imagen no valida');
                    }
                    
                 }
            }
		
			
		$this->render('index',array(
			'model'=>$model,
			'fuModel'=>$fuModel,
			'Us'=>$Us,
			'fichaUsuario'=>$fichaUsuario,
			'localidad'=>$localidad,
			//'usuarioService'=>$usuarioService
			
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
			//'usuarioService'=>$usuarioService
			
		));	
	
	}
	
	public function actionEdicionInfo(){
		
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$this->render('edicionInfo',array(
			'model'=>$model,
			
			//'usuarioService'=>$usuarioService
			
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
			//'usuarioService'=>$usuarioService
			
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
	
	public function actionGaleria(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$model = new ImagenForm();
		 if(isset($_POST['ImagenForm']))
		{                
			if(isset($_FILES) and $_FILES['ImagenForm']['error']['foto']==0)
			 {
				$uf = CUploadedFile::getInstance($model, 'foto');
				if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
					$uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
				{
					  $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
					
					  Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
					  Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
					  $this->refresh();
				}else{
					Yii::app()->user->setFlash('error_imagen','Imagen no valida');
				}
				
			 }
			 	$this->render('galeria',array(
				'Us'=>$Us,
				'perfilSocial'=>$perfilSocial,
				'model'=>$model,
		
			));	
		} else{
			
				$this->render('galeria',array(
				'Us'=>$Us,
				'perfilSocial'=>$perfilSocial,
				'model'=>$model,
		
			));	
		
		
		
		
		}
		}
		
	/*	if(isset($_POST['FileUpload'])) 
            {                
                if(isset($_FILES) and $_FILES['FileUpload']['error']['foto']==0)
                 {
                    $uf = CUploadedFile::getInstance($fuModel, 'foto');
                    if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
                        $uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
                    {
                          $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
						  if($model->foto1!=null){
							$model->foto1 = $uf->getName();
							$model->update();
							$this->render('index',array(
								'Us'=>$Us,
								'perfilSocial'=>$perfilSocial,
								'fuModel' => $fuModel
							
							));
						
						  }else{
							$model->foto1 = $uf->getName();
							$model->save();
						  }
						  
                          Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
                          Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
                          $this->refresh();
                    }else{
                        Yii::app()->user->setFlash('error_imagen','Imagen no valida');
                    }
                    
                 }
            }else{
			
				$this->render('galeria',array(
				'Us'=>$Us,
				'perfilSocial'=>$perfilSocial,
				'fuModel' => $fuModel
		
			));	
			}
		
		

	}*/
	
/*	public function actionUploadFoto(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fuModel= new FileUpload();//modelo que permite subir archivos de imagen
		
		 if(isset($_POST['FileUpload'])) 
            {                
                if(isset($_FILES) and $_FILES['FileUpload']['error']['foto']==0)
                 {
                    $uf = CUploadedFile::getInstance($fuModel, 'foto');
                    if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
                        $uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif"){
                        $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
						 if($perfilSocial->foto1 == null){
							$perfilSocial->foto1 = $uf->getName();
							$perfilSocial->save();
						  }
                          Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
                          Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
                          $this->refresh();
                    }else{
                        Yii::app()->user->setFlash('error_imagen','Imagen no valida');
                    }
                    
                 }
            }
		
			
		$this->render('indexSaveFotos',array(
			'fuModel'=>$fuModel,
		));	
	
	
	
	}*/
/*
	public function actionIndexSaveFotos(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fuModel= new FileUpload();//modelo que permite subir archivos de imagen
		
		$this->render('guardarfotos',array(
		'Us'=>$Us,
		'fuModel'=>$fuModel,
		'model'=>$perfilSocial
		));
	
	}*/
	
	public function actionPrueba(){
	
		$model = new ImagenForm();
		 if(isset($_POST['ImagenForm']))
		{                
			if(isset($_FILES) and $_FILES['ImagenForm']['error']['foto']==0)
			 {
				$uf = CUploadedFile::getInstance($model, 'foto');
				if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
					$uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
				{
					  $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
					
					  Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
					  Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
					  $this->refresh();
				}else{
					Yii::app()->user->setFlash('error_imagen','Imagen no valida');
				}
				
			 }
		}
		$this->render('prueba',array('model'=>$model));
	}

	public function actionPrueba2(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
        
 
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
 
        if(isset($_POST['ImagenForm']))
        {
            $perfilSocial->foto1="algo";
            if($perfilSocial->save())
            {
                if (Yii::app()->request->isAjaxRequest)
                {
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>"Classroom successfully added"
                        ));
                    exit;               
                }
                else
                    $this->redirect(array('dialogbox'));
            }
        }
 
        if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('_form', array('model'=>$perfilSocial), true)));
            exit;               
        }
        else
            $this->render('dialogbox',array('model'=>$perfilSocial,));
    

	}
	public function actionGrabarImagenes(){
		
	//$this->renderPartial('pruebas');
		$Us =  Usuario::model()->findByPk(Yii::app()->user->id);
		$model = new FotosUsuario();
		$model->id_usuario=$Us->id_usuario;
		$model->save();
		 $this->render('grabarImagenes',array('model'=>$model));
	}
	
	public function actionPrueba3(){
	
		$this->render('prueba3');
	}
	
}
