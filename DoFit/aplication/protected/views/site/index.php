<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript">
	
    $( window ).load(function() {
        info();
    });
</script>

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
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
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
<div id="container">
<?php if(Yii::app()->user->isGuest == false): ?>
<?php endif; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
    echo "<div class='form-group'>";
      echo CHtml::beginForm('../actividad/InscripcionActividad','post'); 
      echo CHtml::submitButton('Inscribite a una Actividad',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
   
if($Us->id_perfil == 1){   
   echo "<div class='form-group'>";
      echo CHtml::beginForm('../actividadalumno/ListadoActividades','post'); 
      echo CHtml::submitButton('Actividades a la que estoy inscripto',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
} 
 
if($Us->id_perfil == 2){
   echo "<div class='form-group'>";
      echo CHtml::beginForm('../ProfesorInstitucion/Adhesiongimnasio','post'); 
      echo CHtml::submitButton('Asociate a un gimnasio como Profesor',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
   
   echo "<div class='form-group'>";
      echo CHtml::beginForm('../ProfesorInstitucion/ListadoActividades','post'); 
      echo CHtml::submitButton('Actividades que dicto',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
}
   echo "<div class='form-group'>";
      echo CHtml::beginForm('../perfilSocial/','post'); 
      echo CHtml::submitButton('Ir a la red social de Do Fit!',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
   
      echo "<div class='form-group'>";
      echo CHtml::beginForm('../muro/','post'); 
      echo CHtml::submitButton('Muro',array('class'=>'btn btn-primary'));                      
      echo CHtml::endForm();      
   echo "</div>";
 
?>

  <a href="<?php echo Yii::app()->request->baseUrl; ?>/chat/index" class="btn btn-primary">Chatea con tus compañeros!</a>
</div>
<br>
<br>
<footer class="footer">
    <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
    </div>
</footer>

