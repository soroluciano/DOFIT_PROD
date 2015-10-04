<?php
      $posicion = 0;

      
      if(isset($perfilSocial->foto1)){
          $posicion++;
          $posArray[$posicion] = 1;
      }
      if(isset($perfilSocial->foto2)){
          $posicion++;
          $posArray[$posicion] = 2;
      }
      if(isset($perfilSocial->foto3)){
          $posicion++;
          $posArray[$posicion] = 3;
      }
      if(isset($perfilSocial->foto4)){
          $posicion++;
          $posArray[$posicion] = 4;
      }
      if(isset($perfilSocial->foto5)){
          $posicion++;
          $posArray[$posicion] = 5;
      }
      if(isset($perfilSocial->foto6)){
          $posicion++;
          $posArray[$posicion] = 6;
      }
												
				
      if($posicion==0){
                  ?>
                  
                  <div id="im1" class="osvaldito">			
                    <img src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" alt="" class="img-rounded img1" />
                  </div>									
            
            <?php
                  }
            
            for($i=1;$i<=$posicion;$i++){
                    $property = 'foto'.$posArray[$i];
                  
                  ?>
           
                  <div id="im<?php echo $i; ?>" class="osvaldito show-image">
                              <img src="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$perfilSocial->$property ?>" alt="" class="img-rounded img<?php echo $i; ?>" />
                              <a href="#myDivId<?php echo $i;?>" class="btn btn-lg btn-default ver" id="fancyBoxLink<?php echo $i;?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Ver </span></a>
                              <button class="btn btn-lg btn-default delete" onclick="deleteImagen(<?php echo $posArray[$i];?>);"><span class="glyphicon glyphicon-trash" aria-hidden="true"> Borrar</span></button>

                              <div style="display:none">
                                          <div id="myDivId<?php echo $i;?>">
                                          <!--<div id="desc1"><span>Este soy yo jugando</span></div>-->
                                          <img src="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$perfilSocial->$property ?>" alt="" width="500px" heigh="500px" />
                                          </div>
                              </div>
                  </div>
                  <?php $j = $i+1;
                      if($posicion == 1){
                  ?>
                  <div id="im"<?php echo $j; ?>" class="osvaldito">			
                    <img src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" alt="" class="img-rounded img<?php echo $j; ?>" />
                  </div>		
                  <?php
                  }				
      }
?>
