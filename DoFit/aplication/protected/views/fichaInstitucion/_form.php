<?php
/* @var $this FichaInstitucionController */
/* @var $model FichaInstitucion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ficha-institucion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_institucion'); ?>
		<?php echo $form->textField($model,'id_institucion'); ?>
		<?php echo $form->error($model,'id_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuit'); ?>
		<?php echo $form->textField($model,'cuit'); ?>
		<?php echo $form->error($model,'cuit'); ?>
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