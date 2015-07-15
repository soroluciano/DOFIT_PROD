<?php
/* @var $this FichaInstitucionController */
/* @var $model FichaInstitucion */

$this->breadcrumbs=array(
	'Ficha Institucions'=>array('index'),
	$model->id_ficha=>array('view','id'=>$model->id_ficha),
	'Update',
);

$this->menu=array(
	array('label'=>'List FichaInstitucion', 'url'=>array('index')),
	array('label'=>'Create FichaInstitucion', 'url'=>array('create')),
	array('label'=>'View FichaInstitucion', 'url'=>array('view', 'id'=>$model->id_ficha)),
	array('label'=>'Manage FichaInstitucion', 'url'=>array('admin')),
);
?>

<h1>Update FichaInstitucion <?php echo $model->id_ficha; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>