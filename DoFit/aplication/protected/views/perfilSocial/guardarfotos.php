<!--grabar fotos-->

<?php
	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
	//$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
			
			
		
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'perfil-social-form',
)); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>3000)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	
<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="form">

<?php $formUp=$this->beginWidget('CActiveForm', array(
	'id'=>'imagen-form',
	'enableClientValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); 
?>

	<div class="row">
		<?php echo $formUp->labelEx($fuModel,'foto'); ?>
		<?php echo $formUp->fileField($fuModel,'foto'); ?>
		<?php echo $formUp->error($fuModel,'foto'); ?>
		<?php echo $Us->id_usuario ?>
		
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Subir Imagen'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->