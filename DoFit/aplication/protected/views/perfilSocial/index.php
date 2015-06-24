<?php
/* @var $this PerfilSocialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Perfil Socials',
);

$this->menu=array(
	array('label'=>'Create PerfilSocial', 'url'=>array('create')),
	array('label'=>'Manage PerfilSocial', 'url'=>array('admin')),
);
?>

<h1>Perfil Socials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
