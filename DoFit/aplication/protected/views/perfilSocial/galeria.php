<div id="seccion_imagenes">
			<div class="text-left grey_color"><h2>Mis Fotos</h2></div>
			
			<div class="imagenes">

						<?php
							if(isset($perfilSocial->foto1)){	
						?>
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto1 ?>" class="img-rounded img1">
						<?php		
							}
							
						?>
									<?php
							if(isset($perfilSocial->foto2)){	
						?>
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto2 ?>" class="img-rounded img2">
						<?php		
							}
							
						?>
						<?php
							if(isset($perfilSocial->foto3)){	
						?>
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto3 ?>" class="img-rounded img3">
						<?php		
							}
							
						?>
						<?php
							if(isset($perfilSocial->foto4)){	
						?>
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto4 ?>" class="img-rounded img4">
						<?php		
							}
							
						?>
						<?php
							if(isset($perfilSocial->foto5)){	
						?>
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto5 ?>" class="img-rounded img5">
						<?php		
							}
							
						?>
						<?php
							if(isset($perfilSocial->foto6)){	
						?>
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto6 ?>" class="img-rounded img6">
						<?php		
							}
							
						?>

			</div>
			<!--dialog de prueba descomentar en caso de querer verlo funcionando-->
			<!--<input type='button' class='btn btn-success text-right' onclick='activator();' value='dialog'/>-->

			</div><!-- form --> 			
			
			<div class="overlay" id="overlay" style="display:none;"></div>
	
			<div class="box" id="box">
						<a class="boxclose" id="boxclose" onclick="boxclose();"></a>
						<div id="content">
							<h1>Important message</h1>
							<p>
								   	
							</p>
						</div>
			</div>
		
</div>

<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->