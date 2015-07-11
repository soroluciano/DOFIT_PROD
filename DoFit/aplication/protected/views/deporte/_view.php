<?php
/* @var $this DeporteController */
/* @var $data Deporte */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_deporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_deporte), array('view', 'id'=>$data->id_deporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deporte')); ?>:</b>
	<?php echo CHtml::encode($data->deporte); ?>
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