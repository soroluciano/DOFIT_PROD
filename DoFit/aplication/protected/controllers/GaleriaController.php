<?php

class GaleriaController extends Controller
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

    
    public function actionAmigo(){
      $id=$_POST['id'];
      $this->render('_amigo',array('id'=>$id));
    } 

      public function actionMostrarImagenes(){
        $this->render('_imagenes');	
    }
    
   
    
    
  
}
