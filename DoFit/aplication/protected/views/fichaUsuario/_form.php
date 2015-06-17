<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ficha-usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dni'); ?>
		<?php echo $form->textField($model,'dni',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'dni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<?php echo $form->textField($model,'sexo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'sexo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechanac'); ?>
		<?php echo $form->textField($model,'fechanac'); ?>
		<?php echo $form->error($model,'fechanac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telfijo'); ?>
		<?php echo $form->textField($model,'telfijo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'telfijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conemer'); ?>
		<?php echo $form->textField($model,'conemer',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'conemer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telemer'); ?>
		<?php echo $form->textField($model,'telemer',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'telemer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_localidad'); ?>
		<?php echo $form->textField($model,'id_localidad'); ?>
		<?php echo $form->error($model,'id_localidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'piso'); ?>
		<?php echo $form->textField($model,'piso',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'piso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'depto'); ?>
		<?php echo $form->textField($model,'depto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'depto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fhcreacion'); ?>
		<?php echo $form->textField($model,'fhcreacion'); ?>
		<?php echo $form->error($model,'fhcreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fhultmod'); ?>
		<?php echo $form->textField($model,'fhultmod'); ?>
		<?php echo $form->error($model,'fhultmod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cusuario'); ?>
		<?php echo $form->textField($model,'cusuario',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'cusuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->