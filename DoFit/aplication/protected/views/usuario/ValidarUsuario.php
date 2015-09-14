<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
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
                            <li class="active"><a href="#">Home</a></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/8.jpg" alt="First slide">
        </div>
    </div>
</div>
<div class="container">
<?php 

if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
}else{
	//No está logueado.
	if(isset($_GET['email'])){
	   $usuario = Usuario::model()->findByAttributes(array('email'=>$_GET['email']));
	}
	if($usuario){
		//Existe el código, activo el usuario.
		$usuario->id_estado = 1;
	    $usuario->saveAttributes(array('id_estado'=>$usuario->id_estado));
        
?>
   <div class="containleft left">
        <div class="table">
            <div class="tr">
                <h3 class="sombra">
                   Bienvenido a <b>Do fit!</b>, <?php echo $usuario->email; ?>.<br />
                   Tu cuenta está activada.<br />
                   Ya puedes iniciar sesión en el sitio.
                </h3>
            </div>
        </div>
    </div>
    <div class="containright right">
        <div class="table">
            <div class="tr">
                <div class="login">
                  <?php echo CHtml::link('Volver al Login de DoFit!',array('../aplication'));?><br/><br/>
                </div>
            </div>
        </div>
    </div>
    
<?php
	}else{
		//No existe el código.
?>
	 <div class="containleft left">
        <div class="table">
            <div class="tr">
                <h3 class="sombra">
                   Asegurate de haber copiado correctamente el link<br />
                   para activar tu cuenta.
                </h3>
            </div>
        </div>
    </div>
    <div class="containright right">
        <div class="table">
            <div class="tr">
                <div class="login">
                     <?php echo CHtml::link('Volver al Login de DoFit!',array('../aplication'));?><br/><br/>
                </div>
            </div>
        </div>
    </div>
<?php
	}
}
?>
</div>