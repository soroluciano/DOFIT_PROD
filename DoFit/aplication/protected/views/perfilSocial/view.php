<?php
/* @var $this PerfilSocialController */
/* @var $model PerfilSocial */

$this->breadcrumbs=array(
	'Perfil Socials'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'List PerfilSocial', 'url'=>array('index')),
	array('label'=>'Create PerfilSocial', 'url'=>array('create')),
	array('label'=>'Update PerfilSocial', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Delete PerfilSocial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PerfilSocial', 'url'=>array('admin')),
);
?>

<h1>View PerfilSocial #<?php echo $model->id_usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'foto1',
		'foto2',
		'foto3',
		'foto4',
		'foto5',
		'descripcion',
		'fhcreacion',
		'fhultmod',
		'cusuario',
	),
)); ?>
