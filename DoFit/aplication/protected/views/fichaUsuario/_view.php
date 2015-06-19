<?php
/* @var $this FichaUsuarioController */
/* @var $data FichaUsuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ficha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ficha), array('view', 'id'=>$data->id_ficha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dni')); ?>:</b>
	<?php echo CHtml::encode($data->dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechanac')); ?>:</b>
	<?php echo CHtml::encode($data->fechanac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telfijo')); ?>:</b>
	<?php echo CHtml::encode($data->telfijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('conemer')); ?>:</b>
	<?php echo CHtml::encode($data->conemer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telemer')); ?>:</b>
	<?php echo CHtml::encode($data->telemer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_localidad')); ?>:</b>
	<?php echo CHtml::encode($data->id_localidad); ?>
	<br />

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