<?php
/* @var $this FichaUsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ficha Usuarios',
);

$this->menu=array(
	array('label'=>'Create FichaUsuario', 'url'=>array('create')),
	array('label'=>'Manage FichaUsuario', 'url'=>array('admin')),
);
?>

<h1>Ficha Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
