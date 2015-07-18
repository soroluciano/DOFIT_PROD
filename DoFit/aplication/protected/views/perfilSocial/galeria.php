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
			<input type='button' class='btn btn-success text-right' onclick='indexSaveFotos();' value='Agregar foto'/>
		
		
			<div class="col-md-8">

			<?php $formUp=$this->beginWidget('CActiveForm', array(
				'id'=>'imagen-form',
				'enableClientValidation'=>true,
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				'clientOptions'=>array(
				'validateOnSubmit'=>true,
				),
			)); 
			?>

				<div class="form-group">
					<?php echo $formUp->labelEx($fuModel,'foto'); ?>
					<?php echo $formUp->fileField($fuModel,'foto'); ?>
					<?php echo $formUp->error($fuModel,'foto'); ?>
					
				</div>
				<div class="row buttons">
					<?php echo CHtml::submitButton('Subir Imagen'); ?>
				</div>

			<?php $this->endWidget(); ?>
			</div><!-- form -->
	
</div>