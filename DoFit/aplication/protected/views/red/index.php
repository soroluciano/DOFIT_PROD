
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/red.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/contactos.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/muro.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<?php
//archivos javascript

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/perfil.js');
$cs->registerScriptFile($baseUrl.'/js/muroProfesor.js');
$cs->registerScriptFile("http://js.pusherapp.com/1.9/pusher.min.js");

$canal = Canal::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
if($canal==null){
	$canal = new Canal();
	$canal->id_usuario=$usuario->id_usuario;
	$nombre=md5($usuario->id_usuario."".$ficha->nombre."".$ficha->id_ficha);
	$canal->nombre=$nombre;
	$canal->save();
}


function getActividades($id){
				
	$listaActividades = Yii::app()->db->createCommand("select a.id_actividad,d.deporte,ao.hora,ao.minutos,ao.id_dia,fi.nombre from actividad a inner join actividad_horario ao on a.id_actividad=ao.id_actividad inner join institucion i on a.id_institucion=i.id_institucion inner join ficha_institucion fi on i.id_institucion=fi.id_institucion inner join deporte d on a.id_deporte=d.id_deporte where a.id_usuario=".$id)->queryAll();
	$respuesta="
		<select class='form-control' style='margin-top:5px;' id='sel1'>
		<option>Compartir con...</option>";
	
  foreach($listaActividades as $act ){
	$dia;
	switch($act['id_dia']){
		case 1:{
			$dia="Lunes";	
		}
		case 2:{
			$dia="Martes";
		}
			case 3:{
			$dia="Miercoles";
		}
		case 4:{
			$dia="Jueves";		
		}
		case 5:{
			$dia="Viernes";
		}
		case 6:{
			$dia="Sabado";
		}
		case 7:{
			$dia="Domingo";
		}
		
	}

	$respuesta.="<option id='".$act['id_actividad']."'><a href='#'>".$act['deporte']."-".$act['nombre']."-".$dia."(".$act['hora'].":".$act['minutos']." hs".")</a></li>";
  }
	$respuesta.="</select>";

  return $respuesta;
						
}




?>




<?php 

if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
     $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
     $perfil = PerfilSocial::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
     $nombre = $ficha->nombre;
     $apellido = $ficha->apellido;
  }
?>


<?php $this->renderPartial('_menu');?>

<div class="container marketing">

    <div class="row">
		<?php $this->renderPartial('_cabecera',array('perfil'=>$perfil,'nombre'=>$nombre,'apellido'=>$apellido)); ?>
	</div>
    
    <div class="row">
        <div class="newposts col-lg-10"><button class="btn btn-info"><?php echo "10 "; ?> nuevas actualizaciones</button></div>
    </div>
    
    <input type="hidden" id="canal" value="<?php echo $canal->nombre;?>"/>
    <input type="hidden" id="id_canal" value="<?php echo $canal->id_canal;?>"/>
    <input type="hidden" id="id_actividad_selected" value=""/>
    
	<div id="respuesta_ajax">
        <div class=" col-lg-8 col-md-8 col-sm-5 contenedor-espaciado row">
			<div class="widget-area no-padding blank">
				<div class="status-upload panel-shadow">
					<form action="" method="post">
						<textarea placeholder="¿Qué estas pensando?" id="input_mensaje"></textarea>
						<ul>					
<!--					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
						<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
						<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>-->
						<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
						</ul>

						<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Publicar</button>
						<?php echo "<div class='col-xs-5 col-sm-5 col-lg-5 col-md-5' data-placement='bottom'>".getActividades($usuario->id_usuario)."</div>"; ?>
					
					</form>
					
				</div><!-- Status Upload  -->
				<div class='propaganda-muro-1'>Publicite aqui</div>
			</div><!-- Widget Area -->

		</div><!--fin contenedor espaciado -->
	</div>
    
    <div id="comentarios" class="row">
		 <script> getMensajesFromBase();</script>
    </div>
       
</div>


</body>

</html>
