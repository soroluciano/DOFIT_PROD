<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */

$this->breadcrumbs=array(
	'Ficha Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FichaUsuario', 'url'=>array('index')),
	array('label'=>'Create FichaUsuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ficha-usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ficha Usuarios</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ficha-usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_ficha',
		'id_usuario',
		'dni',
		'sexo',
		'fechanac',
		'telfijo',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
