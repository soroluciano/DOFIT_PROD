<?php
$this->pageTitle=Yii::app()->name . ' - Subir Imagen';
$this->breadcrumbs=array(
	'Subir Imagen',
);
?>

<h1>¿Como subir una Imagen con Yii?</h1>
<?php if(Yii::app()->user->hasFlash("error_imagen")){?>
<div class="flash-error">
    <?php echo Yii::app()->user->getFlash("error_imagen"); ?>   
</div>
<?php }?>
<?php if(Yii::app()->user->hasFlash("noerror_imagen")){?>
<div class="flash-success">    
    <?php echo Yii::app()->user->getFlash("noerror_imagen"); ?>    
</div>
<?php }?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagen-form',
	'enableClientValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los Campos con<span class="required">*</span> Son Boligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->fileField($model,'foto'); ?>
		<?php echo $form->error($model,'foto'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::Button('Subir Imagen'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php if(Yii::app()->user->hasFlash("imagen")){?>
<div class="flash-success">    
    <?php echo CHtml::image(Yii::app()->request->baseUrl."".Yii::app()->user->getFlash("imagen"));?>    
</div>
<?php }?>