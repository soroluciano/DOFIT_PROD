<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/perfilsocial.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/contactos.css" rel="stylesheet">

<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/contactos.js');

?>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php 

if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
     $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
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
                </li>
                <li>

                </li>
                <li>

                </li>
                <li>

                </li>
                <li>

                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li></li>
                <li></li>
								<li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
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
	    $fichaUsuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$id));
	} 

 ?>


<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
		<?php //$this->renderPartial('_cabecera',array('model'=>$model,'nombre'=>$nombre,'apellido'=>$apellido)); ?>
	</div>

    <nav class="navbar navbar-inverse" role="navigation">
       <div class="navbar-header">
		    <ul class="nav navbar-nav">
			 <li id="btn_galeria" style="cursor: pointer;"><a onclick="galeria();" >Imagenes</a></li>			
          </ul>
       </div>
    </nav>
	
	<div class="col-lg-12" id="respuesta_ajax">
			
    </div>


</body>

</html>
