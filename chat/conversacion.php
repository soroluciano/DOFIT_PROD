<?php
  $db = "dofit";
  $server = "localhost";
  $user = "root";
  $password = "";

  $conexion = @mysqli_connect($server, $user, $password, $db);
  if (! $conexion)
  die ("Error de conexion".mysqli_connect_error());
  
  $sql = "SELECT usuario,mensaje FROM conversacion ORDER BY idConversacion asc;";
  $result = mysqli_query($conexion, $sql);
  while ($data  = mysqli_fetch_assoc($result)){
    echo "<p><b>".$data['usuario']."</b> dice :".$data['mensaje']."</p>";
  }
	