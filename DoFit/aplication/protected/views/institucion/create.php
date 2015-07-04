<?php
/* @var $this InstitucionController */
/* @var $model Institucion */
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
                    <a class="navbar-brand" href="#">DoFit!</a>
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/10.jpg" alt="First slide">
        </div>
    </div>
</div>

<div class="container">
    <form>
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'InstitucionForm', 'enableAjaxValidation'=>true, 'enableClientValidation'=>false, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
                <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"Email",'id'=>"exampleInputEmail1")); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password');?>
                <?php echo $form->error($model,'password'); ?>
            </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'nombre');
        echo $form->textField($ficha_institucion,'nombre',array('size'=>200,'maxlength'=>200));
        echo $form->error($ficha_institucion,'nombre');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'cuit');
        echo $form->textField($ficha_institucion,'cuit',array('size'=>11,'maxlength'=>11));
        echo $form->error($ficha_institucion,'cuit');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'telfijo');
        echo $form->textField($ficha_institucion,'telfijo');
        echo $form->error($ficha_institucion,'telfijo');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'celular');
        echo $form->textField($ficha_institucion,'celular');
        echo $form->error($ficha_institucion,'celular');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'direccion');
        echo $form->textField($ficha_institucion,'direccion');
        echo $form->error($ficha_institucion,'direccion');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'piso');
        echo $form->textField($ficha_institucion,'piso');
        echo $form->error($ficha_institucion,'piso');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($ficha_institucion,'depto');
        echo $form->textField($ficha_institucion,'depto');
        echo $form->error($ficha_institucion,'depto');
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($localidad,'Provincia'); ?>
        <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
            array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
                    'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),

                ),'prompt'=>'Seleccione una Provincia'
            )
        );?>
        <?php echo $form->error($localidad,'id_provincia'); ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($localidad,'Localidad');
        echo $form->dropDownList($localidad,'id_localidad',array(''));
        echo $form->error($localidad,'id_localidad');
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrarse': 'Save',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>