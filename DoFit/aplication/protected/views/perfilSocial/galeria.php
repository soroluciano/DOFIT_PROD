<div id="seccion_imagenes">
			<div class="text-left grey_color"><h2>Mis Fotos</h2></div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FORMULARIO-REGISTRO" data-whatever="@getbootstrap">Nueva Foto</button>
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
					<!--	  <a href="#" class="btn btn-succes"><?php //echo CHtml::link('Nueva Imagen', array('/perfilSocial/nuevaFoto')); ?></a>-->
						
						
						
						
						
			</div>
								
			
	
		
			<div  class="modal fade" id="FORMULARIO-REGISTRO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			   <div class="modal-dialog" role="document">
				   <div class="modal-content">
					   <div class="modal-header">
						   <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanAll()"><span aria-hidden="true">&times;</span></button>
						   <h4 class="modal-title" id="exampleModalLabel">Nueva Imagen</h4>
					   </div>
					   <div class="modal-body">
						   <form name="formulario" id="formulario" class="formulario">
							   
							   <div id="upload-file-container" class="form-group">
								   <label for="message-text" class="control-label">Imagen:</label>
								   <br>
								   <input name="file" type="file" id="imagen" title="Buscar imagen" class="btn btn-default"/>
							   </div>
							   <div class="form-group">
								   <label for="message-text" class="control-label">Descripcion:</label>
								   <textarea class="form-control" id="message-text"></textarea>
							   </div>
							   <div class="messages oculto"></div>
							   <div class="showImage"></div>
							   <div class="modal-footer">	
								   <button type="button"  onclick="cleanAll();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								   <input type="button" class="btn btn-primary" id="subirimagenbutton" value="Subir imagen" disabled/>
							   </div>		
						   </form>
					   </div>
				   </div>
			   </div>
			</div>				
				
</div>

<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->