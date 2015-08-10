<?php 
  $db = "dofit";
  $server = "localhost";
  $user = "root";
  $password = "";

  $conexion = @mysqli_connect($server, $user, $password, $db);
  if (! $conexion)
  die ("Error de conexion".mysqli_connect_error());
  
  $sql = "DELETE FROM conversacion";
  $result = mysqli_query($conexion, $sql);
  
 ?>