<?php 
  $db = "dofit";
  $server = "localhost";
  $user = "root";
  $password = "";
  
  $usuario = $_POST['user'];
  $mensaje = $_POST['message'];
  
  $conexion = @mysqli_connect($server, $user, $password, $db);
  if (! $conexion)
  die ("Error de conexion".mysqli_connect_error());
 
  $sql = "INSERT INTO conversacion(usuario, mensaje) VALUES ('$usuario','$mensaje')";
  $result = mysqli_query($conexion, $sql);
  
  if($result) 
   echo "Mensaje Registrado."; 	  
?>  
  
  
  