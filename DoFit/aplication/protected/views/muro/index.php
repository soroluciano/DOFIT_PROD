
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/muro.css" rel="stylesheet">

<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/muro.js');
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
                      <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
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
  <div id="myCarousel" class="carousel_min slide" data-ride="carousel">
      <div class="carousel-inner_min" role="listbox">
          <div class="item active">
              <!--<img class="first-slide_min" src="<?php //echo Yii::app()->request->baseUrl; ?>/img/8.png" alt="First slide">-->
          </div>
      </div>
  </div>

  <div class="container">
      <h1>MURO</h1>
    <div class="posts_case">
      <div class="post_content">
        <div class="post_image">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/images.jpg" class="img-circle img-size" style="width:70px;height:70px;"/>
        </div>    
        <div class="post_text">
          <h5>Dave Gamache</h5>
          <p>
            Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper.
            Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in,
            egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis
            dis parturient montes, nascetur ridiculus mus.
          </p>
        </div> 
      </div>
      
    </div>
  
  </div>



