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

    
    public function actionGetContactos(){
      $busqueda = $_POST['busqueda'];
      $res = str_replace ( "," , "", $busqueda);
      $arr= str_split($res);
      $criteria = new CDbCriteria();
      $criteria->select = "*";
      $criteria->addInCondition('id_usuario', $arr);
      $res =  FichaUsuario::model()->findAll($criteria);
      $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
      $this->renderPartial('_contactos',array('contactos'=>$res,'usuario'=>$usuario));				
				//echo CJSON::encode($res);
				//Yii::app()->end();
    }
    
    public function actionAmigo(){
      $id=$_POST['id'];
      $this->render('_amigo',array('id'=>$id));
    } 



  
}
