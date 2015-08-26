<div id="seccion_imagenes">
			<div class="text-left grey_color"><h2>Mis Fotos</h2></div>
			
			<div class="imagenes">

						<?php
							if(isset($perfilSocial->foto1)){	
						?>  <div id="im1" class="prueba" onmouseover="addBtn(1);" onmouseout="delbtn(1);">
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto1 ?>" class="img-rounded img1">
							</div>
						<?php		
							}
							else{
						?>
						        <div id="im1" class="prueba" onmouseover="addEdBtn(1);" onmouseout="delbtn(1);">
								<img  src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" class="img-rounded img1">
						<?php
							
						}
						?>
						
						<?php
							if(isset($perfilSocial->foto2)){	
						?>  <div id="im2" class="prueba" onmouseover="addBtn(1);" onmouseout="delbtn(2);">
							<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$perfilSocial->foto2 ?>" class="img-rounded img2">
							</div>
						<?php		
							}
							else{
						?>
						        <div id="im2" class="prueba" onmouseover="addEdBtn(3,2);" onmouseout="delbtn(2);">
								<img  src="<?php echo Yii::app()->request->baseUrl;echo "/images/new_pic.png"; ?>" class="img-rounded img2">
						<?php
							
						}
						?>

			</div>

								
								
			<!--dialog de prueba descomentar en caso de querer verlo funcionando-->
			<input type='button' class='btn btn-success text-right' onclick='activator();' value='dialog'/>

			</div><!-- form --> 			
			
			<div class="overlay" id="overlay" style="display:none;"></div>
	
			<div class="box" id="box" style="display:none">
						<a class="boxclose" id="boxclose" onclick="boxclose();"></a>
						<div id="content">
							<h1>Important message</h1>
							
															
												<?php if(Yii::app()->user->hasFlash("error_imagen")){?>
												<div class="flash-error">
													<?php echo Yii::app()->user->getFlash("error_imagen"); ?>   
												</div>
												<?php }?>
												<?php if(Yii::app()->user->hasFlash("noerror_imagen")){?>
												<div class="flash-success">    
													<?php echo Yii::app()->user->getFlash("noerror_imagen"); ?>    
												</div>
												<?php }?>
												
												<div class="form">
												<?php $form=$this->beginWidget('CActiveForm', array(
													'id'=>'imagen-form',
													'enableClientValidation'=>true,
														'htmlOptions'=>array('enctype'=>'multipart/form-data'),
													'clientOptions'=>array(
														'validateOnSubmit'=>true,
													),
												)); ?>
												
													<!--<p class="note">Los Campos con<span class="required">*</span> Son Boligatorios.</p>-->
												
													<div class="row">
														<?php echo $form->labelEx($fuModel,'foto'); ?>
														<?php echo $form->fileField($fuModel,'foto'); ?>
														<?php echo $form->error($fuModel,'foto'); ?>
														<div id="modificacion">
    
															<?php $this->renderPartial('_ajaxContent', array('myValue'=>$myValue)); ?>
    
												        </div>
		
													</div>
													<div class="row buttons">
														<?php //echo CHtml::submitButton('Subir Imagen'); ?>							
														<?php echo CHtml::ajaxButton ("Guardar",
															CController::createUrl('perfilSocial/SaveImage'),array('type'=>'POST',
															//'data'=> 'js:{"data1": val1, "data2": val2 }',                        
															//'success'=>'js:function(string){ alert(string); 
															"fuModel" => $fuModel), 
															array('update' => '#modificacion'));
															  ?> 												
													</div>
												
												<?php $this->endWidget(); ?>
												</div><!-- form -->
												<?php if(Yii::app()->user->hasFlash("imagen")){?>
												<div class="flash-success">    
													<?php echo CHtml::image(Yii::app()->request->baseUrl."".Yii::app()->user->getFlash("imagen"));?>    
												</div>
												<?php }?>
															
															
															
															
									
									
									
									<!----->
							
						</div>
			</div>
		
</div>

<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->