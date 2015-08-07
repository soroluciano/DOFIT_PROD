<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

    public function actionIndexAdmin()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('indexAdmin');
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionLoginAdmin()
    {
        $model = new LoginFormAdmin;
        $errorCode = "";

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // validate user input and redirect to the previous page if valid
        if(isset($_POST['LoginFormAdmin']))
        {
            $model->attributes=$_POST['LoginFormAdmin'];
            if ($model->login() && $model->validate())
            {
                $this->redirect(array('/site/indexAdmin'));

            }
            else
            {
                echo "Datos incorrectos";
            }

        }
        else
        {
            $this->render('loginAdmin',array('model'=>$model));
        }
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
     
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);  
			Yii::app()->end();
		}
         
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			  if(isset($_GET['activo'])){
                 $activo = $_GET['activo'];
		     if( $activo == 1){
               $mail = $model->username;
	           $usuario = Usuario::model()->find('email=:email',array(':email'=>$mail));
			   $usuario->id_estado = 1;
               $usuario->save();			   
             }		   
 		  }   
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
                // ...log in the user and redirect
                Yii::app()->session->open();
				Yii::app()->session['id_usuario'] = Yii::app()->user->id;
				
				$perfil = PerfilSocial::model()->findByPk(Yii::app()->user->id);
               if ($perfil == null) {
                    $usu = new UsuarioService();
                    $usu->createPerfilVacio(Yii::app()->user->id);
                   $this->redirect(array('/perfilSocial/index'));
                } else {
					$this->redirect(array('/site/index'));
                }
            }

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	
	public function actionLoginInstitucion()
	{
		$model=new LoginFormInstitucion;
       
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);  
			Yii::app()->end();
		}
         
		// collect user input data
		if(isset($_POST['LoginFormInstitucion']))
		{
			$model->attributes=$_POST['LoginFormInstitucion'];
			   
		// validate user input and redirect to the previous page if valid
	    if($model->validate() && $model->login()){            
		   // ...log in the user and redirect
          $this->redirect(array('/institucion/home'));
		 }
		}
		// display the login form
		$this->render('/site/logininstitucion',array('model'=>$model));
	}

	 
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
