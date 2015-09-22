<div id="seccion_imagenes">
			<div class="text-left grey_color"><h2>Mis Fotos</h2></div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FORMULARIO-REGISTRO" data-whatever="@getbootstrap">Nueva Foto</button>
			<div class="imagenes">

						
						<?php
										$posicion = 0;		
										if(isset($perfilSocial->foto1)){
												$posicion++;
						        }
										if(isset($perfilSocial->foto2)){
												$posicion++;
						        }
										if(isset($perfilSocial->foto3)){
												$posicion++;
						        }
										if(isset($perfilSocial->foto4)){
												$posicion++;
						        }
										if(isset($perfilSocial->foto5)){
												$posicion++;
						        }
										if(isset($perfilSocial->foto6)){
												$posicion++;
						        }
					
									for($i=1;$i<=$posicion;$i++){
													$property = 'foto'.$i;
												if($i%2 != 1 || $i == 1){
												?>
												        <div id="im<?php echo $i; ?>" class="osvaldito">																
																
												        <a href="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$perfilSocial->$property;?>" class="ifancy"><div id="imagen1"><img src="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$perfilSocial->$property ?>" class="img-rounded img<?php echo $i; ?>"></div></a>
																      
																			<input class="update" type="button" value="Update" />
																		  <input class="delete" type="button" value="Delete" />
																		  <input class="ver" type="button" onclick="op1();" value="Ver" />
												        </div>
												<?php
												}else{
												?>
												<div id="im"<?php echo $i; ?>" class="osvaldito">			
																		<a href="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" class="ifancy"><img src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" class="img-rounded img<?php echo $i?>"></a>
												</div>		
												<?php
												}
												
									}
									
						?>

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