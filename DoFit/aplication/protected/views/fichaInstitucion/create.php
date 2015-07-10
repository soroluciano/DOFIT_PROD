<?php
/* @var $this FichaInstitucionController */
/* @var $model FichaInstitucion */

$this->breadcrumbs=array(
	'Ficha Institucions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FichaInstitucion', 'url'=>array('index')),
	array('label'=>'Manage FichaInstitucion', 'url'=>array('admin')),
);
?>

<h1>Create FichaInstitucion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>