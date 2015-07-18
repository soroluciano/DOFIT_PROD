<!--grabar fotos-->

<?php
	$Us = Usuario::model()->findByPk(Yii::app()->user->id);
	//$perfilSocial = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
			
			
		
?>


<div class="col-md-8">

<?php $formUp=$this->beginWidget('CActiveForm', array(
	'id'=>'imagen-form',
	'enableClientValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); 
?>

	<div class="upload_div">
		<?php echo $formUp->labelEx($fuModel,'foto'); ?>
		<?php echo $formUp->fileField($fuModel,'foto'); ?>
		<?php echo $formUp->error($fuModel,'foto'); ?>
		
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Subir Imagen'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->