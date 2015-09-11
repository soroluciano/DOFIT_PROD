<div id="seccion_imagenes">
			<div class="text-left grey_color"><h2>Mis Fotos</h2></div>
			
			<div class="imagenes">

						<?php
							if(isset($perfilSocial->foto1)){	
						?>  <div id="im1" class="prueba">
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto1 ?>" class="img-rounded img1">
							</div>
						<?php		
							}
							else{
						?>
						        <div id="im1" class="prueba">
								<img  src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" class="img-rounded img1">
						<?php
							
						}
						?>
						
						<?php
							if(isset($perfilSocial->foto2)){	
						?>  <div id="im2" class="prueba">
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto2 ?>" class="img-rounded img2">
							</div>
						<?php		
							}
							else{
						?>
						        <div id="im2" class="prueba">
								<img  src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" class="img-rounded img2">
						<?php
							
						}
						?>

			</div>
								
			<div>
						  <a href="#" class="btn btn-succes"><?php echo CHtml::link('Nueva Imagen', array('/perfilSocial/nuevaFoto')); ?></a>
						
			</div>
								

			</div><!-- form --> 			

	

		
</div>

<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->