<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */

$this->breadcrumbs=array(
	'Ficha Usuarios'=>array('index'),
	$model->id_ficha,
);

$this->menu=array(
	array('label'=>'List FichaUsuario', 'url'=>array('index')),
	array('label'=>'Create FichaUsuario', 'url'=>array('create')),
	array('label'=>'Update FichaUsuario', 'url'=>array('update', 'id'=>$model->id_ficha)),
	array('label'=>'Delete FichaUsuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ficha),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FichaUsuario', 'url'=>array('admin')),
);
?>

<h1>View FichaUsuario #<?php echo $model->id_ficha; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ficha',
		'id_usuario',
		'dni',
		'sexo',
		'fechanac',
		'telfijo',
		'celular',
		'conemer',
		'telemer',
		'id_localidad',
		'direccion',
		'piso',
		'depto',
		'fhcreacion',
		'fhultmod',
		'cusuario',
	),
)); ?>
