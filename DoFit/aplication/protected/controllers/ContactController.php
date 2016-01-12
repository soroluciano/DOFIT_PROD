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
    
      $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
      $busqueda = settype($_POST['busqueda'], "string");   
            
      //$busqueda = str_replace("","", $res);
   
      //echo $busqueda;      
      //if (empty( $_POST['busqueda'])) {
      //   $contactos = Yii::app()->db->createCommand("select distinct acal.id_usuario,fu.nombre,fu.apellido from actividad_alumno acal join ficha_usuario fu where acal.id_actividad in(select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and aa.id_usuario =".$usuario->id_usuario." or a.id_usuario =".$usuario->id_usuario.") limit 4" )->queryAll();

          $contactos =  Yii::app()->db->createCommand("select fu.id_usuario as id_usuario,fu.nombre as nombre ,fu.apellido as apellido from ficha_usuario fu where fu.id_usuario in(".$busqueda.")");
          //$contactos = Yii::app()->db->createCommand("select distinct acal.id_usuario,fu.nombre,fu.apellido from actividad_alumno acal join ficha_usuario fu where acal.id_actividad in(select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and aa.id_usuario =".$usuario->id_usuario." or a.id_usuario =".$usuario->id_usuario.") and acal.id_usuario=fu.id_usuario and fu.nombre like '%".$busqueda."%' or fu.apellido like '%".$busqueda."%' limit 4" )->queryAll();
      //}
      
      		echo CJSON::encode($contactos);
				Yii::app()->end();
				
      
      $this->renderPartial('_contactos',array('contactos'=>$contactos,'usuario'=>$usuario));
    }
    
    public function actionAmigo(){
      $id=$_POST['id'];
      $this->render('_amigo',array('id'=>$id));
    } 



  
}
