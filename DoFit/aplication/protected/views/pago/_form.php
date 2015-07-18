<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actividad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_deporte'); ?>
		<?php echo $form->textField($model,'id_deporte'); ?>
		<?php echo $form->error($model,'id_deporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_institucion'); ?>
		<?php echo $form->textField($model,'id_institucion'); ?>
		<?php echo $form->error($model,'id_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_actividad'); ?>
		<?php echo $form->textField($model,'valor_actividad',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'valor_actividad'); ?>
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