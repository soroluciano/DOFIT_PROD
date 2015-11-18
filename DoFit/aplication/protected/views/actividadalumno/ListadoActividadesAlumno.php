<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet"></link>
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
<br/>
<br/>
<br/>
<br/>
<html>
<div class="container">
  <div class="form">
    <div class="col-md-8"> 
	 <div class="form-group">
   <h3> Seleccione una instituci&oacute;n </h3>
   <select id="institucion" class="form-control"> 
 	  <?php 
       if(!Yii::app()->user->isGuest){
	      echo "<option value='empty' class='form-control'>Seleccione una instituci&oacute;n</option>"; 
	      foreach($instituciones as $ins){
		  echo $ins['nombre'];		  
          echo "<option  value='institucion' name=".$ins['id_institucion'].">".$ins['nombre']."</option>";
	     }
	   }	
      ?> 
   </select>  
   </div>
   </div>
  </div>
 </div> 
</html>
