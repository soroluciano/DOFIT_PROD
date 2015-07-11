<!-- el pelotudo de luciano -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" media="screen, projection">

<?php
/* @var $this PerfilSocialController */
/* @var $model PerfilSocial */

$this->breadcrumbs=array(
	'Perfil Socials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PerfilSocial', 'url'=>array('index')),
	array('label'=>'Create PerfilSocial', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#perfil-social-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Perfil Socials</h1>

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
	'id'=>'perfil-social-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_usuario',
		'foto1',
		'foto2',
		'foto3',
		'foto4',
		'foto5',
		/*
		'descripcion',
		'fhcreacion',
		'fhultmod',
		'cusuario',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
