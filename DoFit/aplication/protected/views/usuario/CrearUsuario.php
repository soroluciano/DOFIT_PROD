<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));?>

      
	<!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
		<div class="row">                     	
		 <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
		 <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"email",'id'=>"exampleInputEmail1")); ?>
		 <?php echo $form->error($model,'email'); ?>
	    </div>   
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password');?>
		<?php echo $form->error($model,'password'); ?>	
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'Perfil'); ?>
		 <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'--Seleccione un Perfil --'));?>
		<?php echo $form->error($model,'id_perfil'); ?>
	</div>
	
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'dni');
	  echo $form->textField($ficha_usuario,'dni',array('size'=>8,'maxlength'=>8));
	  echo $form->error($ficha_usuario,'dni');
	 ?>
	 </div>
	 
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'sexo');
	  echo $form->dropDownList($ficha_usuario,'sexo',array('empty'=>'Seleccione un sexo','M'=>'Masculino','F'=>'Femenino'));
	  echo $form->error($ficha_usuario,'sexo');
	 ?>
	 </div>
	 
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'fechanac');
	  echo $form->dateField($ficha_usuario,'fechanac');
	  echo $form->error($ficha_usuario,'fechanac');
	 ?>
	 </div>
	 
	 <div class="row">
	 <?php 
	  echo $form->labelEx($ficha_usuario,'telfijo');
	  echo $form->textField($ficha_usuario,'telfijo');
	  echo $form->error($ficha_usuario,'telfijo');
	 ?>
    </div>
  
    <div class="row">
	  <?php
	  echo $form->labelEx($ficha_usuario,'conemer');
	  echo $form->textField($ficha_usuario,'conemer');
	  echo $form->error($ficha_usuario,'conemer'); 
     ?>
    </div>

	 <div class="row">
	  <?php
	  echo $form->labelEx($ficha_usuario,'telemer');
	  echo $form->textField($ficha_usuario,'telemer');
	  echo $form->error($ficha_usuario,'telemer'); 
     ?>
    </div>
	
	 <div class="row">
	  <?php
	   echo $form->labelEx($ficha_usuario,'direccion');
	  echo $form->textField($ficha_usuario,'direccion');
	  echo $form->error($ficha_usuario,'direccion');
     ?>
    </div>
	
	 <div class="row">
	  <?php
	   echo $form->labelEx($ficha_usuario,'piso');
	  echo $form->textField($ficha_usuario,'piso');
	  echo $form->error($ficha_usuario,'piso');
     ?>
    </div>
	
	 <div class="row">
	  <?php
	   echo $form->labelEx($ficha_usuario,'depto');
	  echo $form->textField($ficha_usuario,'depto');
	  echo $form->error($ficha_usuario,'depto');
     ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($localidad,'Provincia'); ?>
		 <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
		                                array(
										'ajax'=>array(
		                                              'type'=>'POST',
													  'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
													  'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),
													  
													  ),'prompt'=>'Seleccione una Provincia'
													)
									);?>
		<?php echo $form->error($localidad,'id_provincia'); ?>
	</div>
    
	<div class="row">
	  <?php
	  echo $form->labelEx($localidad,'Localidad');
	  echo $form->dropDownList($localidad,'id_localidad',array(''));
	  echo $form->error($localidad,'id_localidad');
	 ?>
    </div>
   <!-- 
	<div class="row">
		<?//php echo $form->labelEx($model,'fhcreacion');// ?>
		<?//php echo $form->textField($model,'fhcreacion'); //?>
		<?//php echo $form->error($model,'fhcreacion'); //?>
	</div>
	-->
   <!--
	<div class="row">
	    
        <?//php echo $form->labelEx($model,'fhultmod'); //?>
		<?//php echo $form->textField($model,'fhultmod');//?>
		<?//php echo $form->error($model,'fhultmod'); //?>
	</div>
  
	<div class="row">
		<?//php echo $form->labelEx($model,'cusuario'); //?>
		<?//php echo $form->textField($model,'cusuario',array('size'=>60,'maxlength'=>60));// ?>
		<?//php echo $form->error($model,'cusuario'); //?>
	</div>
     -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrarse': 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->