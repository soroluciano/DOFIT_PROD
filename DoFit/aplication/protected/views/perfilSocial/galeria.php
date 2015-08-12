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
			<input type='button' class='btn btn-success text-right' onclick='activator();' value='Agregar foto'/>
		
	

			
			<?php
				$this->pageTitle=Yii::app()->name . ' - Subir Imagen';
				$this->breadcrumbs=array(
					'Subir Imagen',
				);
				?>

				<h1>¿Como subir una Imagen con Yii?</h1>
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

<<<<<<< HEAD
					<p class="note">Los Campos con<span class="required">*</span> Son Boligatorios.</p>

					<div class="row">
						<?php echo $form->labelEx($model,'foto'); ?>
						<?php echo $form->fileField($model,'foto'); ?>
						<?php echo $form->error($model,'foto'); ?>
					</div>
					<div class="row buttons">
						<?php echo CHtml::submitButton('Subir Imagen'); ?>
					</div>

				<?php $this->endWidget(); ?>
				</div><!-- form -->
				<?php if(Yii::app()->user->hasFlash("imagen")){?>
				<div class="flash-success">    
					<?php echo CHtml::image(Yii::app()->request->baseUrl."".Yii::app()->user->getFlash("imagen"));?>    
				</div>
				<?php }?>
			
			
			
			
			
			
			
			
			
			</div><!-- form -->
	
</div>
=======
			<?php $this->endWidget(); ?>
			</div><!-- form --> 
			<?php
				echo CHtml::ajaxLink('View Popup', 'perfilSocial/pruebas', 
				array('update' => '#simple-div'), 
				array('id' => 'simple-link-'.uniqid())
				);
			?>
			<div id="simple-div">simple div</div>
			
			
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
>>>>>>> 4f04d2f05dbeb1f62cecd8b4c3f5f1f4d825676c
