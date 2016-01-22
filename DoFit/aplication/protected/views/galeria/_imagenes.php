
<?php

        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
        $imagenes = Yii::app()->db->createCommand("select * from imagen where id_usuario = ".$usuario->id_usuario )->queryAll(); 
        
        

?>

<div class="container_gallery">
	<div class="row">
    
    <?php
      foreach( $imagenes as $img){
      
      echo "<div class='col-md-3 col-sm-4 col-xs-6 img_class' ><img class='img-responsive' src='".Yii::app()->request->baseUrl."/uploads/".$img["nombre"]."' /></div>";
     
      }
    ?>

  
  </div>
</div>