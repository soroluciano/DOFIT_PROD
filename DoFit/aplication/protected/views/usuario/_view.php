<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario), array('view', 'id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_perfil')); ?>:</b>
	<?php echo CHtml::encode($data->id_perfil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fhcreacion')); ?>:</b>
	<?php echo CHtml::encode($data->fhcreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fhultmod')); ?>:</b>
	<?php echo CHtml::encode($data->fhultmod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cusuario')); ?>:</b>
	<?php echo CHtml::encode($data->cusuario); ?>
	<br />


</div>