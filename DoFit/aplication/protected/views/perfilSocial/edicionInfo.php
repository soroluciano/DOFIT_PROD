<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */
/* @var $form CActiveForm */
?>

<div class="container">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ficha-usuario-edicionInfo-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// See class documentation of CActiveForm for details on this,
		// you need to use the performAjaxValidation()-method described there.
		'enableAjaxValidation'=>false,
	)); ?>

		<?php echo $form->errorSummary($model); ?>

		 <div class="col-md-8">
		
		
			<div class="form-group">
		
				<?php echo $form->labelEx($model,'nombre',array('for'=>"exampleInputEmail1")); ?>
				<?php echo $form->textField($model,'nombre',array('class'=>"form-control",'placeholder'=>"Nombre",'id'=>"exampleInputEmail1")); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'apellido'); ?>
				<?php echo $form->textField($model,'apellido',array('class'=>"form-control",'placeholder'=>"apellido")); ?>
				<?php echo $form->error($model,'apellido'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'dni'); ?>
				<?php echo $form->textField($model,'dni',array('class'=>"form-control",'placeholder'=>"dni")); ?>
				<?php echo $form->error($model,'dni'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'sexo'); ?>
				<?php echo $form->textField($model,'sexo',array('class'=>"form-control",'placeholder'=>"sexo")); ?>
				<?php echo $form->error($model,'sexo'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'fechanac'); ?>
				<?php echo $form->textField($model,'fechanac',array('class'=>"form-control",'placeholder'=>"fechanac")); ?>
				<?php echo $form->error($model,'fechanac'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'direccion'); ?>
				<?php echo $form->textField($model,'direccion',array('class'=>"form-control",'placeholder'=>"direccion")); ?>
				<?php echo $form->error($model,'direccion'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'cusuario'); ?>
				<?php echo $form->textField($model,'cusuario',array('class'=>"form-control",'placeholder'=>"cusuario")); ?>
				<?php echo $form->error($model,'cusuario'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'id_usuario'); ?>
				<?php echo $form->textField($model,'id_usuario',array('class'=>"form-control",'placeholder'=>"id_usuario")); ?>
				<?php echo $form->error($model,'id_usuario'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'id_localidad'); ?>
				<?php echo $form->textField($model,'id_localidad',array('class'=>"form-control",'placeholder'=>"id_localidad")); ?>
				<?php echo $form->error($model,'id_localidad'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'conemer'); ?>
				<?php echo $form->textField($model,'conemer',array('class'=>"form-control",'placeholder'=>"conemer")); ?>
				<?php echo $form->error($model,'conemer'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'telfijo'); ?>
				<?php echo $form->textField($model,'telfijo',array('class'=>"form-control",'placeholder'=>"telfijo")); ?>
				<?php echo $form->error($model,'telfijo'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'celular'); ?>
				<?php echo $form->textField($model,'celular',array('class'=>"form-control",'placeholder'=>"celular")); ?>
				<?php echo $form->error($model,'celular'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'telemer'); ?>
				<?php echo $form->textField($model,'telemer',array('class'=>"form-control",'placeholder'=>"telemer")); ?>
				<?php echo $form->error($model,'telemer'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'piso'); ?>
				<?php echo $form->textField($model,'piso',array('class'=>"form-control",'placeholder'=>"piso")); ?>
				<?php echo $form->error($model,'piso'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'depto'); ?>
				<?php echo $form->textField($model,'depto',array('class'=>"form-control",'placeholder'=>"depto")); ?>
				<?php echo $form->error($model,'depto'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'fhultmod'); ?>
				<?php echo $form->textField($model,'fhultmod',array('class'=>"form-control",'placeholder'=>"fhultmod")); ?>
				<?php echo $form->error($model,'fhultmod'); ?>
			</div>


			<div class="row buttons">
				 <?php echo CHtml::submitButton($model->isNewRecord ? 'Editar': 'Guardar',array('class'=>'btn btn-primary')); ?>
			</div>

		<?php $this->endWidget(); ?>
	</div>
</div><!-- form -->