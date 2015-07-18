<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest){
      //Es un usuario logueado.
	$ins = Institucion::model()->findByPk(Yii::app()->user->id);
    $fichains = FichaInstitucion::model()->find('id_institucion=:id_institucion',array(':id_institucion'=>$ins->id_institucion));
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
                                <li class="active"><a>Hola!  <?php echo $fichains->nombre; ?></a></li>
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
                <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/14.png" alt="First slide">
            </div>
        </div>
    </div>
    <div>
    <?php if(Yii::app()->user->isGuest == false): ?>
    <?php endif; ?>
    <div class="form-group">
    <?php echo CHtml::beginForm('../actividad/CrearActividad','post'); ?>
	<?php echo CHtml::submitButton('Crear Actividad',array('class'=>'btn btn-primary')); ?>                     
    <?php echo CHtml::endForm(); ?>      
	</div>
	<div class="form-group">
	<?php echo CHtml::beginForm('../ProfesorInstitucion/VerSolicitudes','post'); ?>
	<?php echo CHtml::submitButton('Ver solicitudes de Adhesion',array('class'=>'btn btn-primary')); ?>                     
    <?php echo CHtml::endForm(); ?>    
	</div>