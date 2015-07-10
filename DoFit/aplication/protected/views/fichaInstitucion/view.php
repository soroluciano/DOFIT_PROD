<?php
/* @var $this FichaInstitucionController */
/* @var $model FichaInstitucion */

$this->breadcrumbs=array(
	'Ficha Institucions'=>array('index'),
	$model->id_ficha,
);

$this->menu=array(
	array('label'=>'List FichaInstitucion', 'url'=>array('index')),
	array('label'=>'Create FichaInstitucion', 'url'=>array('create')),
	array('label'=>'Update FichaInstitucion', 'url'=>array('update', 'id'=>$model->id_ficha)),
	array('label'=>'Delete FichaInstitucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ficha),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FichaInstitucion', 'url'=>array('admin')),
);
?>

<h1>View FichaInstitucion #<?php echo $model->id_ficha; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ficha',
		'id_institucion',
		'nombre',
		'cuit',
		'telfijo',
		'celular',
		'id_localidad',
		'direccion',
		'piso',
		'depto',
		'fhcreacion',
		'fhultmod',
		'cusuario',
	),
)); ?>
