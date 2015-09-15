

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" rel="stylesheet">
<script type="text/javascript">


</script>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php 

if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
     $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
     $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
  }
  ?>
<html>
<body>
	
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <a href='../'> <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola!  <?php echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Anotarme en actividades</a></li>
                                    <li><a href="#">Ver mis actividades</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Privacidad</li>
                                    <li><a href="#">Configuración</a></li>
                                    <li><a href="#"><?php echo CHtml::link('Salir', array('site/logout')); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Carousel
================================================== -->

<div id="myCarousel" class="carousel_min slide" data-ride="carousel">
    <div class="carousel-inner_min" role="listbox">
        <div class="item active">
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/8.png" alt="First slide">
        </div>
    </div>
</div>
<div>

    <?php if(Yii::app()->user->isGuest == false): ?>
<?php endif; ?>


 <?php 
	if(!Yii::app()->user->isGuest){
	    $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	    $fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
	} 
	$nombre = $fichaUsuario->nombre;
	$apellido = $fichaUsuario->apellido;
/*	$dni = $fichaUsuario->dni;
	$sexo = $fichaUsuario->sexo;
	$fechanac = $fichaUsuario->fechanac;
	$telfijo = $fichaUsuario->telfijo;
	$celular = $fichaUsuario->celular;
	$contactoEmergencia = $fichaUsuario->conemer;
	$telefonoEmergencia = $fichaUsuario->telemer;
	$localidad = $localidad->localidad;
	//falta la provincia
	$direccion = $fichaUsuario->direccion;
	$piso = $fichaUsuario->piso;
	$depto = $fichaUsuario->depto;
 */
 ?>


<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4" style="background-color: black; color:white;width:30%;margin-left:15px;">
            <img src="<?php echo Yii::app()->request->baseUrl;echo "/images/".$model->foto1 ?>" alt="Generic placeholder image" width="140" height="140" class="img-circle">
			<h2><?php echo $nombre." ".$apellido; ?></span></h2>
            <h3>calcular edad</h3>
            <h3>Practico 2 deportes</h3>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-8">
			 <img src="<?php echo Yii::app()->request->baseUrl;echo "/images/default_cover.jpg" ?>" alt="Generic placeholder image" width="100%" height="340px" >
         
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <nav class="navbar navbar-inverse" role="navigation">
       <div class="navbar-header">
		    <ul class="nav navbar-nav">
             <li id="btn_info" style="cursor: pointer;"><a onclick="info();">Informaci&oacute;n</a></li>		
          </ul>
       </div>
       <div>
          <ul class="nav navbar-nav">
             <li id="btn_galeria" style="cursor: pointer;"><a onclick="galeria();" >Imagenes</a></li>
             <li><a href="#">Companeros</a></li>		
          </ul>
       </div>
    </nav>
	
		<div class="col-lg-12" id="respuesta_ajax">

																	
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FORMULARIO-REGISTRO" data-whatever="@getbootstrap">Nueva Foto</button>
	
		
		 <div  class="modal fade" id="FORMULARIO-REGISTRO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Nueva Imagen</h4>
					</div>
					<div class="modal-body">
						<form name="formulario" id="formulario" class="formulario">
							
							<div id="upload-file-container" class="form-group">
								<label for="message-text" class="control-label">Imagen:</label>
								<br>
								<input name="file" type="file" id="imagen" title="Buscar imagen" class="btn btn-default"/>
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label">Descripcion:</label>
								<textarea class="form-control" id="message-text"></textarea>
							</div>
							<div class="messages oculto"></div>
							<div class="showImage"></div>
							<div class="modal-footer">	
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<input type="button" class="btn btn-primary" id="subirimagenbutton" value="Subir imagen"/>
								<input type="hidden" id="imagendeperfil" value="<?php //echo $Us->cimagen; ?>"/>
							</div>		
						</form>
					</div>
				</div>
			</div>
		 </div>	
		
	

		<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadFoto" data-whatever="@getbootstrap">Nueva Foto</button>
	
		
		<div class="modal fade" id="uploadFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Nueva Imagen</h4>
			  </div>
			  <div id="FORMULARIO-REGISTRO" class="modal-body">
				<form  name="formulario" id="formulario" class="formulario">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Imagen:</label>
						<div class="containcampo" >
							<div id="upload-file-container">
								<input type="file" id="imagen" title="Buscar imagen" class="btn btn-default">					
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Descripcion:</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
					<div class="containcampo">
						<div class="messages oculto"></div><br /><br />
						<div class="showImage"></div>
						<br/>
						<br/>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrrar</button>
				<button type="button" class="btn btn-primary" id="subirimagenbutton">Guardar</button>
				<input type="hidden" id="imagendeperfil" value="<?php //echo $Us->cimagen; ?>"/>
			  </div>
			</div>
		  </div>
		</div>

-->

		
		
		
    </div>


</body>
</html>





<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->