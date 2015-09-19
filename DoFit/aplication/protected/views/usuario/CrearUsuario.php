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
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'usuario-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
		<div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
		        <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"Tu email",'id'=>"exampleInputEmail1",'size'=>60,'maxlength'=>60)); ?>	    
		     	<?php echo $form->error($model,'email',array("class"=>"error_pw")); ?>
            </div>
			
            <div class="form-group">
                <?php echo $form->labelEx($model,'password'); ?>
		        <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"Elegí una contraseña",'maxlength'=>15));?>
                <?php echo $form->error($model,'password',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'Perfil'); ?>
		        <div>
                    <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'¿Sos alumno o profesor?','class'=>"form-control"));?>
                </div>
		        <?php echo $form->error($model,'id_perfil',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'nombre'); ?>
                <?php echo $form->textField($profesor,'nombre',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu nombre")); ?>
                <?php echo $form->error($profesor,'nombre',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'apellido'); ?>
                <?php echo $form->textField($profesor,'apellido',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu apellido")); ?>
                <?php echo $form->error($profesor,'apellido',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'dni'); ?>
	            <?php echo $form->textField($profesor,'dni',array('size'=>8,'maxlength'=>8,'class'=>"form-control",'placeholder'=>"Tu dni")); ?>
	            <?php echo $form->error($profesor,'dni',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'sexo'); ?>
	            <div>
                        <?php echo $form->dropDownList($profesor,'sexo',array('empty'=>'¿Mujer u Hombre?','M'=>'Masculino','F'=>'Femenino','O'=>'Otro'),array('class'=>"form-control")); ?>
                </div>
	            <?php echo $form->error($profesor,'sexo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'fechanac'); ?>
	            <?php echo $form->dateField($profesor,'fechanac',array('class'=>"form-control",'placeholder'=>"dd/mm/yyyy")); ?>
	            <?php echo $form->error($profesor,'fechanac',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'telfijo'); ?>
	            <?php echo $form->textField($profesor,'telfijo',array('class'=>"form-control",'placeholder'=>"Tu teléfono fijo")); ?>
	            <?php echo $form->error($profesor,'telfijo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'conemer'); ?>
	            <?php echo $form->textField($profesor,'conemer',array('class'=>"form-control",'placeholder'=>"Nombre del contacto por emergencia")); ?>
	            <?php echo $form->error($profesor,'conemer'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'telemer'); ?>
	            <?php echo $form->textField($profesor,'telemer',array('class'=>"form-control",'placeholder'=>"Teléfono del contacto por emergencia")); ?>
	            <?php echo $form->error($profesor,'telemer'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'direccion'); ?>
	            <?php echo $form->textField($profesor,'direccion',array('class'=>"form-control",'placeholder'=>"Tu dirección")); ?>
	            <?php echo $form->error($profesor,'direccion',array("class"=>"error_pw")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'piso'); ?>
	            <?php echo $form->textField($profesor,'piso',array('class'=>"form-control",'placeholder'=>"¿Vivís en un piso?")); ?>
                <?php echo $form->error($profesor,'piso'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($profesor,'depto'); ?>
	            <?php echo $form->textField($profesor,'depto',array('class'=>"form-control",'placeholder'=>"¿Vivís en un departamento?")); ?>
	            <?php echo $form->error($profesor,'depto'); ?>
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
		        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrate!': 'Save',array('class'=>'btn btn-primary')); ?>
	        </div>
        </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->