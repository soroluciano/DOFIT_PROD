<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_actividad'); ?>
		<?php echo $form->textField($model,'id_actividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_deporte'); ?>
		<?php echo $form->textField($model,'id_deporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_institucion'); ?>
		<?php echo $form->textField($model,'id_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor_actividad'); ?>
		<?php echo $form->textField($model,'valor_actividad',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fhcreacion'); ?>
		<?php echo $form->textField($model,'fhcreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fhultmod'); ?>
		<?php echo $form->textField($model,'fhultmod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cusuario'); ?>
		<?php echo $form->textField($model,'cusuario',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->