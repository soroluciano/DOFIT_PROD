<?php 

 
 class ProfesorInstitucionController extends Controller
 {
  
  public function actionAdhesiongimnasio()
  {
     if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	 $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    }

    $cantinstituciones = Institucion::model()->count();
    $cantadhesiones = ProfesorInstitucion::model()->count('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
	if($cantadhesiones == 0){
       $this->render('Adhesiongimnasio');  
	}
	else{
	 echo "Ya se encuentra registrado en todas las instituciones disponibles";
    }
  }
 } 