<?php
/* @var $this PerfilSocialController */
/* @var $data PerfilSocial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario), array('view', 'id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto1')); ?>:</b>
	<?php echo CHtml::encode($data->foto1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto2')); ?>:</b>
	<?php echo CHtml::encode($data->foto2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto3')); ?>:</b>
	<?php echo CHtml::encode($data->foto3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto4')); ?>:</b>
	<?php echo CHtml::encode($data->foto4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto5')); ?>:</b>
	<?php echo CHtml::encode($data->foto5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fhcreacion')); ?>:</b>
	<?php echo CHtml::encode($data->fhcreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fhultmod')); ?>:</b>
	<?php echo CHtml::encode($data->fhultmod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cusuario')); ?>:</b>
	<?php echo CHtml::encode($data->cusuario); ?>
	<br />

	*/ ?>

</div>