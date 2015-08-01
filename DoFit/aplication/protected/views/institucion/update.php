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
                            <li class="active"><a href="#">Index</a></li>
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
    <div>
        <h1>Modificar <?php echo $ficha_institucion->nombre; ?></h1>
    </div>
    <br>
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'InstitucionForm', 'enableAjaxValidation'=>true, 'enableClientValidation'=>false, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
                <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"Email",'id'=>"exampleInputEmail1")); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->hiddenField($model,'password',array('type'=>"hidden",'class'=>"form-control",'placeholder'=>"Password"));?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'nombre'); ?>
                <?php echo $form->textField($ficha_institucion,'nombre',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Gimnasio")); ?>
                <?php echo $form->error($ficha_institucion,'nombre'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'cuit'); ?>
                <?php echo $form->textField($ficha_institucion,'cuit',array('size'=>11,'maxlength'=>11,'class'=>"form-control",'placeholder'=>"Cuit")); ?>
                <?php echo $form->error($ficha_institucion,'cuit'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'telfijo'); ?>
                <?php echo $form->textField($ficha_institucion,'telfijo',array('class'=>"form-control",'placeholder'=>"Telefono")); ?>
                <?php echo $form->error($ficha_institucion,'telfijo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'celular'); ?>
                <?php echo $form->textField($ficha_institucion,'celular',array('class'=>"form-control",'placeholder'=>"Celular")); ?>
                <?php echo $form->error($ficha_institucion,'celular'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'direccion'); ?>
                <?php echo $form->textField($ficha_institucion,'direccion',array('class'=>"form-control",'placeholder'=>"Dirección")); ?>
                <?php echo $form->error($ficha_institucion,'direccion'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'piso'); ?>
                <?php echo $form->textField($ficha_institucion,'piso',array('class'=>"form-control",'placeholder'=>"Piso")); ?>
                <?php echo $form->error($ficha_institucion,'piso'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_institucion,'depto'); ?>
                <?php echo $form->textField($ficha_institucion,'depto',array('class'=>"form-control",'placeholder'=>"Departamento")); ?>
                <?php echo $form->error($ficha_institucion,'depto'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($localidad,'Provincia'); ?>
                <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
                    array('ajax'=>array('type'=>'POST',
                        'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
                        'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),
                    ),'prompt'=>'Seleccione una Provincia','class'=>"form-control"));?>
                <?php echo $form->error($localidad,'id_provincia'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($localidad,'Localidad'); ?>
                <div>
                    <?php echo $form->dropDownList($localidad,'id_localidad',array('empty'=>"Selecciona tu localidad"),array('class'=>"form-control")); ?>
                </div>
                <?php echo $form->error($localidad,'id_localidad'); ?>
            </div>
            <div class="form-group">
                <br>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrarse': 'Modificar',array('class'=>'btn btn-primary')); ?>
            </div>
            <div class="form-group">
                <a href="../index">Volver</a>
            </div>
        </div>
    </form>
</div>

<?php $this->endWidget(); ?>