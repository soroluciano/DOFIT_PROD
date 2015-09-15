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
		$fuModel= new FileUpload();//modelo que permite subir archivos de imagen
		
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		
		/*carga de div de confirmacion vacia*/
		
        $myValue = "Content loaded";
		/*
		if(isset($_POST['FileUpload'])) 
            {                
                if(isset($_FILES) and $_FILES['FileUpload']['error']['foto']==0)
                 {
                    $uf = CUploadedFile::getInstance($fuModel, 'foto');
                    if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
                        $uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
                    {
                          $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());*/
			/*			  if($fuModel->foto1!=null){
							$fuModel->foto1 = $uf->getName();
							$fuModel->update();
							$this->render('index',array(
								'Us'=>$Us,
								'perfilSocial'=>$perfilSocial,
								'fuModel' => $fuModel
							
							));
						
						  }else{
							$fuModel->foto1 = $uf->getName();
							$fuModel->save();
						  }*/
						  
                   /*       Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
                          Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
                          $this->refresh();
                    }else{
                        Yii::app()->user->setFlash('error_imagen','Imagen no valida');
                    }
                    
                 }
            }else{
			*/
				$this->render('galeria',array(
				'Us'=>$Us,
				'perfilSocial'=>$perfilSocial,
				'myValue' => $myValue,
				'fuModel' => $fuModel
				
		
				));	
			//}
		
		
	}
	
	public function actionPruebaPost(){
		$this->render('pruebaPost');
	}
	
	public function actionSaveImage(){
		if(isset($_POST['fuModel'])==null){
			$fuModel= new FileUpload();//modelo que permite subir archivos de imagen
		}else{
			$fuModel = $_POST['fuModel'];
		}
		$data = array();
        //$data["myValue"] = "Content updated in AJAX";
		 
		 $myValue = $_POST['myValue'];
		 $this->render('pruebaPost');
		 //$this->renderPartial('pruebaPost', $myValue, false, true);
		//if(isset($_POST['FileUpload'])) 
         //   {                
          //      if(isset($_FILES) and $_FILES['FileUpload']['error']['foto']==0)
            //     {
  //                  $uf = CUploadedFile::getInstance($fuModel, 'foto');
 //                   if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
  //                      $uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
  //                  {
   //                       $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
			/*			  if($fuModel->foto1!=null){
							$fuModel->foto1 = $uf->getName();
							$fuModel->update();
							$this->render('index',array(
								'Us'=>$Us,
								'perfilSocial'=>$perfilSocial,
								'fuModel' => $fuModel
							
							));
						
						  }else{
							$fuModel->foto1 = $uf->getName();
							$fuModel->save();
						  }*/
						  
 //                         Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$uf->getName()." Subida Correctamente");
  //                        Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
   //                       $this->refresh();
	//					  $this->renderPartial('_ajaxContent', $data, false, true);
    //                }else{
    //                    Yii::app()->user->setFlash('error_imagen','Imagen no valida');
	//					echo "no funciona";
   //                 }
                    
                 //}
				 
            //}
		
		
	}
	
	
public function actionPrueba(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$modelForm = new ImagenForm();
		$model = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		
		
		
		 if(isset($_POST['ImagenForm'])){                
			if(isset($_FILES) and $_FILES['ImagenForm']['error']['foto']==0){
				$name = $_FILES['ImagenForm']['name']['foto'];
				$filename  = pathinfo($name, PATHINFO_FILENAME);
				$ext = pathinfo($name, PATHINFO_EXTENSION);
				$newName = date("m-d-Y-h-i-s", time())."-".$filename.'.'.$ext;
			 
				$uf = CUploadedFile::getInstance($modelForm, 'foto');
				if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
					$uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif"){			 
					  $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$newName);	
					  Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$newName." Subida Correctamente");
					  Yii::app()->user->setFlash('imagen','/images/'.$newName);
					  $this->refresh();
					if($uf->save()){ 
							$this->render('index',array(
							'model'=>$model,
							'Us'=>$Us,
							'fichaUsuario'=>$fichaUsuario,
							'localidad'=>$localidad
						//'usuarioService'=>$usuarioService
						
							));	
						}
				}else{
					Yii::app()->user->setFlash('error_imagen','Imagen no valida');
				}
				
			 }
				
		}
			$this->render('prueba',array('model'=>$modelForm));
	}
	
	public function actionPrueba2(){
		$Us = Usuario::model()->findByPk(Yii::app()->user->id);
		$modelForm = new ImagenForm();
		$model = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
		$localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$fichaUsuario->id_localidad));
		
		//$this->render('pruebaPost');
		
		/*$uf = CUploadedFile::getInstance($modelForm, 'foto');
		if($uf!=null){
			$this->render('pruebaPost');
		}*/
		
		 if(isset($_POST['ImagenForm'])){
			
			//$this->render('pruebaPost');
			$data = "hola";
			$this->renderPartial('pruebaPost', $data, false, true);
			
		/*	if(isset($_FILES) and $_FILES['ImagenForm']['error']['foto']==0){
				$name = $_FILES['ImagenForm']['name']['foto'];
				$filename  = pathinfo($name, PATHINFO_FILENAME);
				$ext = pathinfo($name, PATHINFO_EXTENSION);
				$newName = date("m-d-Y-h-i-s", time())."-".$filename.'.'.$ext;
			 
				$uf = CUploadedFile::getInstance($modelForm, 'foto');
				if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
					$uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif"){			 
					  $uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$newName);	
					  //Yii::app()->user->setFlash('noerror_imagen',"Imagen: ".$newName." Subida Correctamente");
					  //Yii::app()->user->setFlash('imagen','/images/'.$newName);
					  $this->refresh();
					if($uf->save()){ 
							$this->render('index',array(
							'model'=>$model,
							'Us'=>$Us,
							'fichaUsuario'=>$fichaUsuario,
							'localidad'=>$localidad
						//'usuarioService'=>$usuarioService
						
							));
								$this->render('pruebaPost');
						}
				}else{
					Yii::app()->user->setFlash('error_imagen','Imagen no valida');
				}
				
			 }*/
				
		}
			
	}
	
	
	public function actionNuevaFoto(){
		
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
		
			
		$this->render('nuevaFoto',array(
			'model'=>$model,
			'fuModel'=>$fuModel,
			'Us'=>$Us,
			'fichaUsuario'=>$fichaUsuario,
			'localidad'=>$localidad,
		));	
		
		
		
	}
	

}
