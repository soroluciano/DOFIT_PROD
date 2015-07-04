<?php
/* @var $this InstitucionController */
/* @var $model Institucion */
/* @var $form CActiveForm */
?>


<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'InstitucionForm',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    ));?>

    <div class="row">
        <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
        <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"email",'id'=>"exampleInputEmail1")); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
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