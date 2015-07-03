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

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionLoginAdmin()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('loginAdmin');
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
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
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
			if($model->validate() && $model->login())
                // ...log in the user and redirect
                $this->redirect(array('/site/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    public function actionHol()
    {

        $dataProvider=new CActiveDataProvider('User');
        //$model=CActiveRecord::model("User")->findAll();
        //$this->render('backendUsers',array('model'=>$model));

    /*     $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider
    ));*/

        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
           // 'filter' => $model,
            //lets tell the pager to use our own css file
            'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
            //the same for our entire grid. Note that this value can be set to "false"
            //if you set this to false, you'll have to include the styles for grid in some of your css files
            //'cssFile'=>false,
            'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
            //changing the text above the grid can be fun
            'summaryText' => 'Yiiplayground is showing you {start} - {end} of {count} cool records',
            //and you can even set your own css class to the grid container
            'htmlOptions' => array('class' => 'grid-view rounded'),
            'columns' => array(
                array(
                    'name' => 'username',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->username)'
                ),
                array(
                    'name' => 'email',
                    'type' => 'raw',
                    'value' => 'CHtml::link(CHtml::encode($data->email), "mailto:".CHtml::encode($data->email))',
                ),
                //styling default buttons
                array(
                    'header' => '(fake) Actions',
                    'class' => 'CButtonColumn',
                    'viewButtonImageUrl' => Yii::app()->baseUrl . '/images/' . 'gr-view.png',
                    'updateButtonImageUrl' => Yii::app()->baseUrl . '/images/' . 'gr-update.png',
                ),
            ),
        ));

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