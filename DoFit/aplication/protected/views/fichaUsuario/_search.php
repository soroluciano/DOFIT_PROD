<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ficha'); ?>
		<?php echo $form->textField($model,'id_ficha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dni'); ?>
		<?php echo $form->textField($model,'dni',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sexo'); ?>
		<?php echo $form->textField($model,'sexo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechanac'); ?>
		<?php echo $form->textField($model,'fechanac'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telfijo'); ?>
		<?php echo $form->textField($model,'telfijo',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conemer'); ?>
		<?php echo $form->textField($model,'conemer',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telemer'); ?>
		<?php echo $form->textField($model,'telemer',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_localidad'); ?>
		<?php echo $form->textField($model,'id_localidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'piso'); ?>
		<?php echo $form->textField($model,'piso',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'depto'); ?>
		<?php echo $form->textField($model,'depto',array('size'=>10,'maxlength'=>10)); ?>
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