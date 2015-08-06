<?php
/* @var $this PerfilSocialController */
/* @var $model FotosUsuario */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subir-foto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="row">
<?php echo $form->labelEx($model,'fotosUsuario'); ?>
<?php echo $form->fileField($model,'fotosUsuario'); ?>
<?php echo $form->error($model,'fotosUsuario'); ?>
</div>


<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
</div>
<?php $this->endWidget(); ?>
