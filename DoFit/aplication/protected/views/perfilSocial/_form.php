<!-- el pelotudo de luciano -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" media="screen, projection">

<?php
/* @var $this PerfilSocialController */
/* @var $model PerfilSocial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'perfil-social-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto1'); ?>
		<?php echo $form->textField($model,'foto1',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'foto1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto2'); ?>
		<?php echo $form->textField($model,'foto2',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'foto2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto3'); ?>
		<?php echo $form->textField($model,'foto3',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'foto3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto4'); ?>
		<?php echo $form->textField($model,'foto4',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'foto4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto5'); ?>
		<?php echo $form->textField($model,'foto5',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'foto5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>3000)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
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