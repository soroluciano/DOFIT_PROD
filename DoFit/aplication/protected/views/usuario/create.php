<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
*/
?>
    <h1> Registrar Usuario </h1>

<?php $this->renderPartial('CrearUsuario', array('model'=>$model,'ficha_usuario'=>$ficha_usuario,'localidad'=>$localidad)); ?>

