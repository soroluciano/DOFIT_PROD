<?php
class ChatController extends Controller
{
  public function actionIndex() 
  {
    $this->render('index');
  }
 
  public function actionChat() 
  {
    $this->render('pantallachat');
  }
  
  
  public function actionRegistrarmensaje()
  {
	$conversacion = new Conversacion;
	$usuarioori = $_POST['user'];
    $mensaje = $_POST['mensaje'];
	$idusuarioori = Yii::app()->user->id;
	$idusuariodes = $_POST['idusuario'];
	
	$conversacion->usuario = $usuarioori;
	$conversacion->mensaje = $mensaje;
	$conversacion->id_usuarioori = $idusuarioori;
	$conversacion->id_usuariodes = $idusuariodes;
	$conversacion->id_usuario = $idusuarioori;
    if($conversacion->save()) 
       echo "Mensaje Registrado."; 
    // Ingreso nuevamente la conversacion a la base para poder borrarla según el usuario logueado
    $conversacionrep = new Conversacion;
	$conversacionrep->usuario = $usuarioori;
	$conversacionrep->mensaje = $mensaje;
	$conversacionrep->id_usuarioori = $idusuarioori;
	$conversacionrep->id_usuariodes = $idusuariodes;
	$conversacionrep->id_usuario = $idusuariodes;
    if($conversacionrep->save()) 
       echo "Mensaje Registrado.";
    	
  }

	

  public function actionMostrarConversaciones()
  {
    $idusuario1 = Yii::app()->user->id;
	$idusuario2 = $_POST['idusuario'];
	$criteria = new CDbCriteria;
	$criteria->condition = '(id_usuarioori =:idusuario1 AND id_usuariodes =:idusuario2
	                        OR  id_usuarioori =:idusuario2 AND id_usuariodes =:idusuario1) 
							AND id_usuario =:idusuario1'; 
    $criteria->order = 'id_conversacion ASC';
	$criteria->params = array(':idusuario1'=>$idusuario1,':idusuario2'=>$idusuario2);
	$mensajes = Conversacion :: model()->findAll($criteria);
     
	 foreach ($mensajes as $men){
            
  		echo "<p><b>".$men->usuario."</b> dice :".$men->mensaje."</p>";
	  }
  }

  // borra todos los mensajes únicamente del lado del usuario logueado
  public function actionBorrarMensajes()
  {
    $valor = $_POST['valor'];
	$idusuario2 = $_POST['idusuario'];
	$idusuario1 = Yii::app()->user->id;
	 if($valor == 1){
         $criteria = new CDbCriteria;
	     $criteria->condition = '(id_usuarioori =:idusuario1 AND id_usuariodes =:idusuario2
	                             OR  id_usuarioori =:idusuario2 AND id_usuariodes =:idusuario1)
								 AND id_usuario =:idusuario1';
	     $criteria->params = array(':idusuario1'=>$idusuario1,':idusuario2'=>$idusuario2);          
 	     $mensajes = Conversacion :: model()->findAll($criteria);
		 
		 foreach($mensajes as $men){
		          $men->delete();
	     }
	 }
  }    
} 
?>