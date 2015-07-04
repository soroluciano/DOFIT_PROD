<?php

class PerfilSocialController extends Controller
{

	public $layout='//layouts/column2';
/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
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



    public function actionPerfilSocialIndex(){
        $this->render('indexA');
    }


    public function actionUpdatePerfilSocial(){
            //echo "hola yo soy el callback de perfil social";
		$model = new FileUpload();
		$form = new CForm('application.views.UploadForm', $model);

        $this->render('indexA',array('form'=>$form));

    }

    //public function actionUpdateImages(){

	public function actionUpload() {
		$model = new UploadForm();
		$form = new CForm('application.views.uploadForm', $model);
			if ($form->submitted('submit') && $form->validate()) {
				$form->model->image = CUploadedFile::getInstance($form->model, 'foto');
				$form->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uf->getName());
				Yii::app()->user->setFlash('success', 'File Uploaded');
				$this->redirect(array('perfilSocial/indexA'));
			}
			$this->render('perfilSocial/perfilSocialA', array('form' => $form));
	}
	/*
	 public function actionImagen(){
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
            $this->render('imagen',array('model'=>$model));
        }
	*/
	



}
