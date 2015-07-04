<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>


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
                    <a class="navbar-brand" href="#">DoFit!</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="navbar-form navbar-right">
                    <div class="form-group">
                        <?php echo $form->textField($model,'username',array('class'=>"form-control",'placeholder'=>"email",'id'=>"exampleInputEmail1")); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"Password",'id'=>"exampleInputPassword1")); ?>
                    </div>
                    <?php echo CHtml::submitButton('Ingresar a Do Fit!',array("class"=>"btn btn-primary")); ?>
                    <div class="form-group">
                        <?php echo $form->error($model,'password');?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->error($model,'username'); ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/4.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>¿Qué es DoFit?</h1>
                    <p>DoFit es la primer y única aplicación que te permitirá anotarte en actividades deportivas desde tu casa.</p>
                    <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">¿Tenes cuenta?</a></p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/5.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>¿Cómo funciona?</h1>
                    <p>Registrate en simples pasos y empezá ¡Anotaté en la actividad que quieras en el gimnasio que quieras!.</p>
                    <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/6.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Red Social</h1>
                    <p>¡Comunicate con tu gimnasio, profesor y tus compañeros vía chat!.</p>
                    <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
                </div>
            </div>
			
        </div>
		
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>¿Tenés un gimnasio?</h2>
            <p>Hacé click <a href="#">acá</a>, dejanos tu solicitud y nos comunicaremos con vos a la brevedad para darte de alta en DoFit.</a></p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/2.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>¿Sos profesor o alumno?</h2>
            <p>Hacé click <a href="#">acá</a> y registrate de forma gratuita, como profesor podrás darte de alta en los gimnasios que des clases y como alumno podrás anotarte en las actividades que quieras.</p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/3.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>¿No sabés cómo funciona?</h2>
            <p>Hacé click <a href="#">acá</a> para ver como funciona de DoFit. </p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Entrená <span class="text-muted">lo que quieras y donde quieras</span></h2>
            <p class="lead">En DoFit hay registradas más de 500 instituciones, con cientos de actividades cada una.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" src="<?php echo Yii::app()->request->baseUrl; ?>/img/7.jpg" alt="Generic placeholder image">
        </div>
    </div>
    <!-- /END THE FEATURETTES -->

    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Volvé al principio</a></p>
        <p>&copy; 2015 DoFit. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>
</div><!-- /.container -->
               
						<div>
						 <?php echo CHtml::link('¿Olvidaste tu contraseña?',array('usuario/Recuperarpassword'));?>
						</div>

      <br>
	 <?php echo CHtml::link('Registrate en Do Fit!',array('usuario/create'));?><br/><br/>

<?php $this->endWidget(); ?>
        </div>
      </div>
 </div>
</div>

