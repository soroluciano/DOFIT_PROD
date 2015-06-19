<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */

$this->breadcrumbs=array(
	'Ficha Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FichaUsuario', 'url'=>array('index')),
	array('label'=>'Manage FichaUsuario', 'url'=>array('admin')),
);
?>

<h1>Create FichaUsuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>