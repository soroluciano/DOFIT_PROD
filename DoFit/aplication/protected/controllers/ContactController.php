<?php

class ContactController extends Controller
{
  
  
		public function actionIndex()
		{
        	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
          $this->render('index',array('usuario'=>$usuario));
      
    }

  	
		public function actionLogout()
		{
				Yii::app()->user->logout();
				$this->redirect(Yii::app()->homeUrl);
		}





  
}
