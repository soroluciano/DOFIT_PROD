<?php
/* @var $this PerfilSocialController */
/* @var $model PerfilSocial */

$this->breadcrumbs=array(
	'Perfil Socials'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List PerfilSocial', 'url'=>array('index')),
	array('label'=>'Create PerfilSocial', 'url'=>array('create')),
	array('label'=>'View PerfilSocial', 'url'=>array('view', 'id'=>$model->id_usuario)),
	array('label'=>'Manage PerfilSocial', 'url'=>array('admin')),
);
?>

<h1>Update PerfilSocial <?php echo $model->id_usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>