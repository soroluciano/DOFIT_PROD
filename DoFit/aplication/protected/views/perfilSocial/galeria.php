<div id="seccion_imagenes">
			<div class="text-left grey_color"><h1><span class="glyphicon glyphicon-camera"></span><?php echo "Mis Im&aacute;genes"; ?></h1>
				
				<?php
				//if($perfilSocial->foto2!=null && $perfilSocial->foto3!=null 
				//&&$perfilSocial->foto4!=null && $perfilSocial->foto5!=null &&
				//$perfilSocial->foto6!=null){
					echo "<button type='button' id='btnNuevo' title='Para subir una nueva imagen borre alguna de las existentes' class='btn btn-primary right btn-lg' data-toggle='modal' data-target='#FORMULARIO-REGISTRO' data-whatever'@getbootstrap'>Nueva Foto</button>";
				//}else{
				//	echo "<button type='button' title='Subir nueva Imagen' id='btnNuevo' class='btn btn-primary right btn-lg' data-toggle='modal' onclick='showModal();' data-target='#FORMULARIO-REGISTRO' data-whatever='@getbootstrap'>Nueva Foto</button>";	
				//}
				?>
			</div>
			
			<div class="imagenes">
						
						<?php $this->renderPartial('_imagenes', array('perfilSocial'=>$perfilSocial)); ?>
						
			</div>
							
			<div  class="modal fade" id="FORMULARIO-REGISTRO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="true">
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
				
</div>

