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
	$conversacion->idusuarioori = $idusuarioori;
	$conversacion->idusuariodes = $idusuariodes;
	
    if($conversacion->save()) 
       echo "Mensaje Registrado."; 	  
  }
  

  public function actionMostrarConversaciones()
  {
    $idusuario1 = Yii::app()->user->id;
	$idusuario2 = $_POST['idusuario'];
	$criteria = new CDbCriteria;
	$criteria->condition = 'idusuarioori =:idusuario1 AND idusuariodes =:idusuario2
	                        OR  idusuarioori =:idusuario2 AND idusuariodes =:idusuario1';
    $criteria->order = 'idConversacion ASC';
	$criteria->params = array(':idusuario1'=>$idusuario1,':idusuario2'=>$idusuario2);
	$mensajes = Conversacion :: model()->findAll($criteria);
     
	 foreach ($mensajes as $men){
            
  		echo "<p><b>".$men->usuario."</b> dice :".$men->mensaje."</p>";
	  }
  }

  public function actionBorrarMensajes()
  {
    $valor = $_POST['valor'];
	$idusuario1 = Yii::app()->user->id;
	$idusuario2 = 5;  // esta harcodeado por el momento
	 if($valor == 1){
         $criteria = new CDbCriteria;
	     $criteria->condition = 'idusuarioori =:idusuario1 AND idusuariodes =:idusuario2
	                             OR  idusuarioori =:idusuario2 AND idusuariodes =:idusuario1';
	     $criteria->params = array(':idusuario1'=>$idusuario1,':idusuario2'=>$idusuario2);          
 	     $mensajes = Conversacion :: model()->findAll($criteria);
		 
		 foreach($mensajes as $men){
		          $men->delete();
	     }
	 }
  }    
} 
?>