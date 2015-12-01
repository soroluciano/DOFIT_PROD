
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/muro.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<?php
$baseUrl = Yii::app()->baseUrl;

$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
$ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
	
$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
if($canal==null){
	$canal = new Canal();
	$canal->id_usuario=$usuario->id_usuario;
	$nombre=md5($usuario->id_usuario."".$ficha->nombre."".$ficha->id_ficha);
	$canal->nombre=$nombre;
	$canal->save();
}


$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muroalumno.js');	





?>

<?php if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    //$usuario = Usuario::model()->findByPk(Yii::app()->user->id);

	//$actividades = Yii::app()->db->createCommand("select distinct(act.id_actividad) from actividad act left join usuario us on act.id_usuario=us.id_usuario where us=".$usuario->id_usuario."")->queryAll();

    //$actividad = Actividad::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
	
}
?>


<script src="http://js.pusherapp.com/1.9/pusher.min.js"></script>

<?php
	
	$this->pageTitle=Yii::app()->name;
	
	if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
	$ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
	}
?>
  
<?php $this->renderPartial('_menu'); ?>
  
<body>
  <div id="container" class="container">
	<div class="row">
	<h1>Soy alumno</h1>
    <div id="comentarios" class="row">
		<?php $this->renderPartial('_posts',array('resultSet'=>$resultSet)); ?>
    </div>
	<input type="hidden" id="canal" value="<?php echo $canal->nombre;?>"/>
	<input type="hidden" id="id_canal" value="<?php echo $canal->id_canal;?>"/>
	<input type="hidden" id="id_actividad_selected" value=""/>
  </div>   
</body>


