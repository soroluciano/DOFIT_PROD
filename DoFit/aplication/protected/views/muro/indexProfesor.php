
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/muro.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muro.js');
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
    <div>
      <!--  <h1>Soy Profesor</h1>-->
    </div>

	<div class="row">
		<div class="col-md-8 contenedor-espaciado">
			<div class="widget-area no-padding blank">
				<div class="status-upload">
					<form action="" method="post">
						<textarea placeholder="¿Qué estas pensando?" id="input_mensaje"></textarea>
						<ul>
<!--					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
						<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
						<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>-->
						<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
						</ul>
						<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Publicar</button>
					</form>
				</div><!-- Status Upload  -->
			</div><!-- Widget Area -->
		</div>
	</div>
    <div id="comentarios" class="row">
		<?php $this->renderPartial('_mensajesProfesor',array('resultSet'=>$resultSet)); ?>
    </div>
	
</div>   
</body>


