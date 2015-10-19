<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" rel="stylesheet">

<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/perfil.js');
?>

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

<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../getting-started/">Getting started</a>
                </li>
                <li>
                    <a href="../css/">CSS</a>
                </li>
                <li>
                    <a href="../components/">Components</a>
                </li>
                <li>
                    <a href="../javascript/">JavaScript</a>
                </li>
                <li>
                    <a href="../customize/">Customize</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://themes.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Themes');">Themes</a></li>
                <li><a href="http://expo.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');">Expo</a></li>
                <li><a href="http://blog.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');">Blog</a></li>
            </ul>
        </nav>
    </div>
</header>
<br>
<br>
<br>
<br>
<br>

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
            <?php 
				if($model->foto1){
				?>
				<div class="profile_img">
				<img src="<?php echo Yii::app()->request->baseUrl;echo "/uploads/".$model->foto1 ?>" alt="Generic placeholder image" width="140" height="140" class="img-circle">
					<input type="button" value="Cambiar foto"/>
				</div>
				<?php
				}else{
				?>
				<div class="profile_img">
					<img src="<?php echo Yii::app()->request->baseUrl;echo "/images/profile_defect_picture.png"; ?>" alt="Generic placeholder image" width="140" height="140" class="img-circle profile_img">
					<input type="button" value="Cambiar foto"/>
				</div>	
				<?php
				}
			?>
			
			
			
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
			 <li id="btn_galeria" style="cursor: pointer;"><a onclick="galeria();" >Imagenes</a></li>			
          </ul>
       </div>
       <div>
          <ul class="nav navbar-nav">
             <li id="btn_info" style="cursor: pointer;"><a onclick="info();">Informaci&oacute;n</a></li>
             <li><a href="#">Companeros</a></li>		
          </ul>
       </div>
    </nav>
	
	<div class="col-lg-12" id="respuesta_ajax">
			<div id="loadingImage" style="display:none;"><img src="<?php echo Yii::app()->request->baseUrl;echo "/img/722.GIF" ?>"</div>
    </div>


</body>

</html>
