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
                            <li class="active"><a>Hola! Administrador</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../../site/indexAdmin">Home</a></li>
                                    <li><a href="../institucion/index">ABM gimnasios</a></li>
                                    <li role="separator" class="divider"></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/10.jpg" alt="First slide">
        </div>
    </div>
</div>
<div class="container">
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'InstitucionForm', 'enableAjaxValidation'=>true, 'enableClientValidation'=>false, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($model,'deporte',array('for'=>"exampleInputEmail1")); ?>
                <?php echo $form->textField($model,'deporte',array('class'=>"form-control",'placeholder'=>"Deporte",'id'=>"exampleInputEmail1")); ?>
                <?php echo $form->error($model,'deporte'); ?>
            </div>
            <div class="form-group">
                <br>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Deporte': 'Modificar',array('class'=>'btn btn-primary')); ?>
            </div>
            <div class="form-group">
                <a href="../index">Volver</a>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
