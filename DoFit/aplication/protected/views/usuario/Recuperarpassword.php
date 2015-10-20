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
                            <li class="active"><a>Hola!</a></li>
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

    <div class="form">
        <div class="container">
            <!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
            <div class="row">
                <div class="col-md-6">
                    <h2 class="bs-docs-featurette-title">Recuperar contraseña</h2>
                    <br>
                    <div> Ingrese el mail de cual desea recuperar la contraseña</div>
                    <br>
                    <?php){
                    ?>
                    <div class="form-group">
                        <?php echo CHtml::beginForm('Recuperarpassword2','post'); ?>
                        <?php echo CHtml::activeTextField($usuario,'email',array('class'=>"form-control",'placeholder'=>"email",'id'=>"exampleInputEmail1")); ?>
                        <br/>
                        <?php echo CHtml::Button('Enviar',array('type'=>'submit','class'=>'btn btn-primary','name'=>'Enviar','data-target'=>'#Usuario', 'data-toggle'=>'modal')); ?>
                        <?php echo CHtml::endForm(); ?>

                        <?php
                        if (isset($_POST['Enviar'])){
                            if($encontro == 0) {
                                echo "<div class='modal fade' id='Usuario' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								    <div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close' onClick='location.reload();'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
											</div>
											<div class='modal-body'>
											El usuario ingresado no est&aacute; registrado.
											</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
										</div>
										</div>
									</div>
								</div>";

                            }
                            if($encontro == 1) {
                                echo "<div class='modal fade' id='Usuario' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								    <div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
											</div>
											<div class='modal-body'>
											Se envió un mail a su cuenta para recueperar su contraseña.
											</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
										</div>
										</div>
									</div>
								</div>";
                            }
                        }?>
                    </div>
                </div>
            </div>
        </div>
			