<?php
class ChatController extends Controller
{
  public function actionIndex() 
  {
    $this->render('index');
  }
   
  public function actionRegistrarmensaje()
  {
	$conversacion = new Conversacion;
	$usuario = $_POST['user'];
    $mensaje = $_POST['message'];	
	$conversacion->usuario = $usuario;
	$conversacion->mensaje = $mensaje;
   
    if($conversacion->save()) 
       echo "Mensaje Registrado."; 	  
  }
  
  public function actionMostrarConversaciones()
  {
    $mensajes = Conversacion::model()->findAll(array('order'=>'idConversacion ASC'));
     foreach ($mensajes as $men){
         echo "<p><b>".$men->usuario."</b> dice :".$men->mensaje."</p>";
	  }
  }

  public function actionBorrarMensajes()
  {
    $valor = $_POST['valor'];
	 if($valor == 1){
         Conversacion::model()->deleteAll();   
	 }
  }    
} 
?>