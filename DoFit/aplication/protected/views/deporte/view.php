<?php
/* @var $this DeporteController */
/* @var $model Deporte */

$this->breadcrumbs=array(
	'Deportes'=>array('index'),
	$model->id_deporte,
);

$this->menu=array(
	array('label'=>'List Deporte', 'url'=>array('index')),
	array('label'=>'Create Deporte', 'url'=>array('create')),
	array('label'=>'Update Deporte', 'url'=>array('update', 'id'=>$model->id_deporte)),
	array('label'=>'Delete Deporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_deporte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deporte', 'url'=>array('admin')),
);
?>

<h1>View Deporte #<?php echo $model->id_deporte; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_deporte',
		'deporte',
		'fhcreacion',
		'fhultmod',
		'cusuario',
	),
)); ?>
