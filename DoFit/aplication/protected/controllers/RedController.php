
<?php

class RedController  extends Controller{
      public function actionIndex(){
          
          $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
          $resultSet = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.fotoPerfil,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =".$usuario->id_usuario." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();
         // $resultSetAl = Yii::app()->db->createCommand("select pm.id_posteo,pm.posteo,ps.fotoPerfil,fu.nombre,fu.apellido FROM perfil_muro_profesor pm,actividad_alumno aa, actividad a,ficha_usuario fu,perfil_social ps where pm.id_actividad=aa.id_actividad and aa.id_actividad = a.id_actividad and a.id_usuario=ps.id_usuario and aa.id_usuario=".$usuario->id_usuario )>queryAll();
         $this->render('index',array('usuario'=>$usuario,'resultSet'=>$resultSet));
      
  
      }
    
    public function actionSaveImagen(){
          //modificar y poner la clase imagen
        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
            $nombreImagen = $_POST['data'];
            if($nombreImagen != null){
              $imagen = new Imagen();
              $imagen->id_usuario=$usuario->id_usuario;
              $imagen->nombre=$nombreImagen;
              $imagen->fhcreacion= new CDbExpression('NOW()');
              $imagen->cusuario="pepe";
              if($imagen->save()){
                echo "grabado";
              }else{
                echo "no se ha podido grabar_1";
              }
            }else{
              echo "no se ha podido grabar_2";
            }
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
    
     
    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    

	 public function actionGetSearcherContactos(){
			$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
      $busqueda = $_POST['busqueda'];
      $resultSet = Yii::app()->db->createCommand("select distinct acal.id_usuario,fu.nombre,fu.apellido from actividad_alumno acal join ficha_usuario fu where acal.id_actividad in(select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and aa.id_usuario =".$usuario->id_usuario." or a.id_usuario =".$usuario->id_usuario.") and acal.id_usuario=fu.id_usuario and fu.nombre like '%".$busqueda."%' or fu.apellido like '%".$busqueda."%' limit 4" )->queryAll();
			//$resultSet = Yii::app()->db->createCommand("select distinct acal.id_usuario,fu.nombre,fu.apellido from actividad_alumno acal join ficha_usuario fu where acal.id_actividad in(select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and aa.id_usuario =5 or a.id_usuario =5) and acal.id_usuario=fu.id_usuario and fu.nombre like '%va%' or fu.apellido like '%va%' limit 4" )->queryAll();
      //$this->renderPartial('_contactos',array('contactos'=>$contactos,'usuario'=>$usuario));
			//$resultSet = Yii::app()->db->createCommand("select distinct acal.id_usuario,fu.nombre,fu.apellido from actividad_alumno acal join ficha_usuario fu where acal.id_actividad in(select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and aa.id_usuario =".$usuario->id_usuario." or a.id_usuario =".$usuario->id_usuario.") and acal.id_usuario=fu.id_usuario" )->queryAll();
			//$this->renderPartial('_contactos',array('contactos'=>$contactos,'usuario'=>$usuario));
	
      echo CJSON::encode($resultSet);
      Yii::app()->end();
   }

   public function actionPruebaAjax(){
    $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    $busqueda = $_GET['q'];

    $resultSet = Yii::app()->db->createCommand("select distinct acal.id_usuario as id,concat(fu.nombre,' ',fu.apellido) as name from actividad_alumno acal join ficha_usuario fu where acal.id_actividad in(select distinct(a.id_actividad) from actividad_alumno aa,actividad a where aa.id_actividad=a.id_actividad and aa.id_usuario =".$usuario->id_usuario." or a.id_usuario =".$usuario->id_usuario.") and acal.id_usuario=fu.id_usuario and fu.nombre like '%".$busqueda."%' or fu.apellido like '%".$busqueda."%' limit 4" )->queryAll(); 
    if ($resultSet){
        echo CJSON::encode($resultSet);
    }else{
      echo "error";
    }
    
    
  }
    public function actionPrueba(){
      $this->render('prueba');
    }
            
            
}

?>