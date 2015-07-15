<?php
/* @var $this DeporteController */
/* @var $model Deporte */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deporte-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deporte'); ?>
		<?php echo $form->textField($model,'deporte',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'deporte'); ?>
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