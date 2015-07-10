<?php
/* @var $this FichaInstitucionController */
/* @var $data FichaInstitucion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ficha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ficha), array('view', 'id'=>$data->id_ficha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->id_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuit')); ?>:</b>
	<?php echo CHtml::encode($data->cuit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telfijo')); ?>:</b>
	<?php echo CHtml::encode($data->telfijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_localidad')); ?>:</b>
	<?php echo CHtml::encode($data->id_localidad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('piso')); ?>:</b>
	<?php echo CHtml::encode($data->piso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('depto')); ?>:</b>
	<?php echo CHtml::encode($data->depto); ?>
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

	*/ ?>

</div>