
<?php

        function paginate($count,$imagenes,$max){
          $cuenta = $count;
          $maximo = $max;
          $linksMenu="";
          $posicion=0;
          $pagina=0;
          foreach( $imagenes as $img){
            $posicion++;
            
            if($posicion == $maximo+1){
              $pagina++;
              $maximo=$maximo*2;
            }
            if($posicion == 2){
              echo "<div class='col-md-3 col-sm-4 col-xs-6 img_class pagina_".$pagina. "' ><img class='img-responsive' style='overflow:hidden;width=250px;height:250px;visibility:hidden' src='".Yii::app()->request->baseUrl."/uploads/".$img["nombre"]."' /></div>";
            }else{
              echo "<div class='col-md-3 col-sm-4 col-xs-6 img_class pagina_".$pagina. "' ><img class='img-responsive' style='overflow:hidden;width=250px;height:250px' src='".Yii::app()->request->baseUrl."/uploads/".$img["nombre"]."' /></div>";
            }
          }
            
          $linksMenu = "<ul class='pagination'>".showNumbers($cuenta,$maximo)."</ul>";
     
          return $linksMenu;
        }
        
        function showNumbers($count,$max){
            $flagLimit = 15;
            $flagSize = 0;
            $linkNumbers="";
            $j=0;     
            $flagSize = $count/$max;
            
            
            if($flagSize != 0 ){
              
              for($i=0; $i<$flagSize; $i++){
                $j=$i+1;
                $linkNumbers .= "<li><a href='getPage(".$i.")'>".$j."</a></li>";
                $j=0;
              }
 
            }else{
               $linkNumbers = "<li><a href='getPage(0)'>1</a></li>";
            }
            return $linkNumbers;
        }



        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
        $imagenes = Yii::app()->db->createCommand("select * from imagen where id_usuario = ".$usuario->id_usuario )->queryAll(); 
        $count = count ($imagenes);
        $max = 12;

        

?>

<div class="container_gallery">
	<div class="row">
    
    <?php
      //foreach( $imagenes as $img){
      //
      //echo "<div class='col-md-3 col-sm-4 col-xs-6 img_class'><img class='img-responsive' style='overflow:hidden;width=250px;height:250px' src='".Yii::app()->request->baseUrl."/uploads/".$img["nombre"]."' /></div>";
      //
      //}
     $linksMenu=paginate($count,$imagenes,$max);
     echo "<div id='menu-pagination'>".$linksMenu."</div>";
     
  ?>		
  </div>


</div>