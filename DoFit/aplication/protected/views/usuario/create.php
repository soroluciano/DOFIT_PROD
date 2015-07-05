<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);
?>
<div>
<?php $this->renderPartial('CrearUsuario', array('model'=>$model,'ficha_usuario'=>$ficha_usuario,'localidad'=>$localidad)); ?>
</div>

