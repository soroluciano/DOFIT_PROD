<?php
/* @var $this FichaUsuarioController */
/* @var $model FichaUsuario */

$this->breadcrumbs=array(
	'Ficha Usuarios'=>array('index'),
	$model->id_ficha=>array('view','id'=>$model->id_ficha),
	'Update',
);

$this->menu=array(
	array('label'=>'List FichaUsuario', 'url'=>array('index')),
	array('label'=>'Create FichaUsuario', 'url'=>array('create')),
	array('label'=>'View FichaUsuario', 'url'=>array('view', 'id'=>$model->id_ficha)),
	array('label'=>'Manage FichaUsuario', 'url'=>array('admin')),
);
?>

<h1>Update FichaUsuario <?php echo $model->id_ficha; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>