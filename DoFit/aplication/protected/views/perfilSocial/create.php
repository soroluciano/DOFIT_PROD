<?php
/* @var $this PerfilSocialController */
/* @var $model PerfilSocial */

$this->breadcrumbs=array(
	'Perfil Socials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PerfilSocial', 'url'=>array('index')),
	array('label'=>'Manage PerfilSocial', 'url'=>array('admin')),
);
?>

<h1>Create PerfilSocial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>