<?php
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
 
    //obtenemos el archivo a subir
    
    if(isset($_FILES['file']['name'])){
       $fole = $_FILES['file']['name']; 
       //comprobamos si existe un directorio para subir el archivo
       //si no es así, lo creamos
       if(!is_dir("../uploads/"))
           mkdir("../uploads/", 0777);
       //comprobamos si el archivo ha subido
       if ($fole && move_uploaded_file($_FILES['file']['tmp_name'],"../uploads/".$fole)){
          sleep(3);//retrasamos la petición 3 segundos
          echo $fole;//devolvemos el nombre del archivo para pintar la imagen
       }
    }
    
    
    
}else{
    throw new Exception("Error Processing Request", 1);  
}
?>