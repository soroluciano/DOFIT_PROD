

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
																		
			<?php if(Yii::app()->user->hasFlash("error_imagen")){?>
			<div class="flash-error">
				<?php echo Yii::app()->user->getFlash("error_imagen"); ?>   
			</div>
			<?php }?>
			<?php if(Yii::app()->user->hasFlash("noerror_imagen")){?>
			<div class="flash-success">    
				<?php echo Yii::app()->user->getFlash("noerror_imagen"); ?>    
			</div>
			<?php }?>
			
			<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'imagen-form',
				'enableClientValidation'=>true,
					'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
			
				<!--<p class="note">Los Campos con<span class="required">*</span> Son Boligatorios.</p>-->
			
				<div class="row">
					<?php echo $form->labelEx($fuModel,'foto'); ?>
					<?php echo $form->fileField($fuModel,'foto'); ?>
					<?php echo $form->error($fuModel,'foto'); ?>
					<div id="modificacion">
					</div>
	
				</div>
				<div class="row buttons">
						<?php echo CHtml::submitButton('Subir Imagen'); ?>
				</div>
	
			<?php $this->endWidget(); ?>
			</div><!-- form -->
			<?php if(Yii::app()->user->hasFlash("imagen")){?>
			<div class="flash-success" stlyle="width:100px;height:100px;">    
				<?php echo CHtml::image(Yii::app()->request->baseUrl."".Yii::app()->user->getFlash("imagen"));?>    
			</div>
			<?php }?>
																
	
		</div>
		
		 <div id="FORMULARIO-REGISTRO">
					<form name="formulario" id="formulario" class="formulario">
						<h1>Prueba cristian</h1>
								<div class="containcampo" >
							<br />
							<span class="azul">Imagen de perfil</span>
							<div id="upload-file-container">
							<input name="file" type="file" id="imagen" class="button" style="float: left; background-color: rgb(255, 255, 255); border: 0px none; margin-top: 5px; width: 85px; background-image: none;color:#E85851"/>
							</div>
							<input type="button" id="subirimagenbutton" value="Subir imagen" style="cursor:pointer;width: 100px; float: left; border: 0px none; background-color: rgb(255, 255, 255); margin-top: 10px;" />
							<input type="hidden" id="imagendeperfil" value="<?php //echo $Us->cimagen; ?>"/>
						</div>
						<div class="containcampo">
							<div class="messages oculto"></div><br /><br />
							<div class="showImage"></div>
							<br/>
							<br/>
						</div>
					</form>
		 </div>	
		
    </div>


</body>
</html>





<!--TODO-->
<!--AGREGAR DESCRIPCIONES A LAS IMAGENES Y MODIFICAR LAS TABLAS Y MODELO-->