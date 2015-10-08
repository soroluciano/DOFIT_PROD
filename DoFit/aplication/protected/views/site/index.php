<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" rel="stylesheet">
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript">
	
    $( window ).load(function() {
        info();
    });
</script>

<?php 

if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
     $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
     $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
  }
  ?>

<!--<div class="navbar-wrapper">
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
                   <a href='../'> <img class="navbar-brand-img" src="/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola! </a></li>
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Anotarme en actividades</a></li>
                                    <li><a href="#">Ver mis actividades</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Privacidad</li>
                                    <li><a href="#">Configuración</a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div> -->

<!-- Carousel
================================================== -->

<!--<div id="myCarousel" class="carousel_min slide" data-ride="carousel">
    <div class="carousel-inner_min" role="listbox">
        <div class="item active">
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/8.png" alt="First slide">
        </div>
    </div>
</div>
<div>-->

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
  <?php if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	      $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	   $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
  }
	  
  ?>	   
    <?php if(Yii::app()->user->isGuest == false): ?>
<?php endif; ?>
<br>
<br>

<?php 
   echo "<div class='form-group'>";
	  echo CHtml::beginForm('../actividad/InscripcionActividad','post'); 

    echo "<div class='form-group'>";
      echo CHtml::beginForm('../actividad/inscripcion','post'); 
      echo CHtml::submitButton('Inscribite a una Actividad',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";

if($Us->id_perfil == 2){
   echo "<div class='form-group'>";
      echo CHtml::beginForm('../ProfesorInstitucion/Adhesiongimnasio','post'); 
      echo CHtml::submitButton('Asociate a un gimnasio como Profesor',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
}
   echo "<div class='form-group'>";
      echo CHtml::beginForm('../perfilSocial/','post'); 
      echo CHtml::submitButton('Ir a la red social de Do Fit!',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";	
	
?>

  <a href="<?php echo Yii::app()->request->baseUrl; ?>/chat/index" class="btn btn-primary">Chatea con tus compañeros!</a>

