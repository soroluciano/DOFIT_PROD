<div id="seccion_imagenes">
			<div class="text-left grey_color"><h2>Mis Fotos</h2></div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FORMULARIO-REGISTRO" data-whatever="@getbootstrap">Nueva Foto</button>
			<div class="imagenes">
						<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true">icono</span>
						</button>
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
																		<button type="button" value="Modificar" class="btn btn-lg btn-default update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Editar</span></button>
																		<button class="btn btn-lg btn-default delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"> Borrar</span></button>

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
								 <!--
							   <div class="form-group">
								   <label for="message-text" class="control-label">Descripcion:</label>
								   <textarea class="form-control" id="message-text"></textarea>
							   </div>-->
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
			<p>COSO</p>
			

	
				
</div>

<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->