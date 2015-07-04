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
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/8.jpg" alt="First slide">
        </div>
    </div>
</div>

<<<<<<< HEAD

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
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

      
	<!-- <p class="note">Campos con <span class="required">*</span> son requeridos.</p>  -->
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
		<?php echo $form->labelEx($model,'Perfil'); ?>
		 <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'--Seleccione un Perfil --'));?>
		<?php echo $form->error($model,'id_perfil'); ?>
	</div>
	
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'nombre');
	  echo $form->textField($ficha_usuario,'nombre');
	  echo $form->error($ficha_usuario,'nombre');
	 ?>
	 </div>
	
   	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'apellido');
	  echo $form->textField($ficha_usuario,'apellido');
	  echo $form->error($ficha_usuario,'apellido');
	 ?>
	 </div>	
	 
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'dni');
	  echo $form->textField($ficha_usuario,'dni',array('size'=>8,'maxlength'=>8));
	  echo $form->error($ficha_usuario,'dni');
	 ?>
	 </div>
	 
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'sexo');
	  echo $form->dropDownList($ficha_usuario,'sexo',array('empty'=>'Seleccione un sexo','M'=>'Masculino','F'=>'Femenino'));
	  echo $form->error($ficha_usuario,'sexo');
	 ?>
	 </div>
	 
	<div class="row">
	<?php 
	  echo $form->labelEx($ficha_usuario,'fechanac');
	  echo $form->dateField($ficha_usuario,'fechanac');
	  echo $form->error($ficha_usuario,'fechanac');
	 ?>
	 </div>
	 
	 <div class="row">
	 <?php 
	  echo $form->labelEx($ficha_usuario,'telfijo');
	  echo $form->textField($ficha_usuario,'telfijo');
	  echo $form->error($ficha_usuario,'telfijo');
	 ?>
    </div>
  
    <div class="row">
	  <?php
	  echo $form->labelEx($ficha_usuario,'conemer');
	  echo $form->textField($ficha_usuario,'conemer');
	  echo $form->error($ficha_usuario,'conemer'); 
     ?>
    </div>

	 <div class="row">
	  <?php
	  echo $form->labelEx($ficha_usuario,'telemer');
	  echo $form->textField($ficha_usuario,'telemer');
	  echo $form->error($ficha_usuario,'telemer'); 
     ?>
    </div>
	
	 <div class="row">
	  <?php
	   echo $form->labelEx($ficha_usuario,'direccion');
	  echo $form->textField($ficha_usuario,'direccion');
	  echo $form->error($ficha_usuario,'direccion');
     ?>
    </div>
	
	 <div class="row">
	  <?php
	   echo $form->labelEx($ficha_usuario,'piso');
	  echo $form->textField($ficha_usuario,'piso');
	  echo $form->error($ficha_usuario,'piso');
     ?>
    </div>
	
	 <div class="row">
	  <?php
	   echo $form->labelEx($ficha_usuario,'depto');
	  echo $form->textField($ficha_usuario,'depto');
	  echo $form->error($ficha_usuario,'depto');
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

=======
<div class="container">
    <form>
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'usuario-form', 'enableAjaxValidation'=>true, 'enableClientValidation'=>false, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
		        <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"Tu email",'id'=>"exampleInputEmail1")); ?>
		        <?php echo $form->error($model,'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password'); ?>
		        <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"Elegí una contraseña"));?>
                <?php echo $form->error($model,'password'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'Perfil'); ?>
		        <div>
                    <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'¿Sos alumno o profesor?','class'=>"form-control"));?>
                </div>
		        <?php echo $form->error($model,'id_perfil'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'nombre'); ?>
                <?php echo $form->textField($ficha_usuario,'nombre',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu nombre")); ?>
                <?php echo $form->error($ficha_usuario,'nombre'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'apellido'); ?>
                <?php echo $form->textField($ficha_usuario,'apellido',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu apellido")); ?>
                <?php echo $form->error($ficha_usuario,'apellido'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'dni'); ?>
	            <?php echo $form->textField($ficha_usuario,'dni',array('size'=>8,'maxlength'=>8,'class'=>"form-control",'placeholder'=>"Tu dni")); ?>
	            <?php echo $form->error($ficha_usuario,'dni'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'sexo'); ?>
	            <div>
                        <?php echo $form->dropDownList($ficha_usuario,'sexo',array('empty'=>'¿Mujer u Hombre?','M'=>'Masculino','F'=>'Femenino','O'=>'Otro'),array('class'=>"form-control")); ?>
                </div>
	            <?php echo $form->error($ficha_usuario,'sexo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'fechanac'); ?>
	            <?php echo $form->dateField($ficha_usuario,'fechanac',array('class'=>"form-control",'placeholder'=>"dd/mm/yyyy")); ?>
	            <?php echo $form->error($ficha_usuario,'fechanac'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'telfijo'); ?>
	            <?php echo $form->textField($ficha_usuario,'telfijo',array('class'=>"form-control",'placeholder'=>"Tu teléfono fijo")); ?>
	            <?php echo $form->error($ficha_usuario,'telfijo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'conemer'); ?>
	            <?php echo $form->textField($ficha_usuario,'conemer',array('class'=>"form-control",'placeholder'=>"Nombre del contacto por emergencia")); ?>
	            <?php echo $form->error($ficha_usuario,'conemer'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'telemer'); ?>
	            <?php echo $form->textField($ficha_usuario,'telemer',array('class'=>"form-control",'placeholder'=>"Teléfono del contacto por emergencia")); ?>
	            <?php echo $form->error($ficha_usuario,'telemer'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'direccion'); ?>
	            <?php echo $form->textField($ficha_usuario,'direccion',array('class'=>"form-control",'placeholder'=>"Tu dirección")); ?>
	            <?php echo $form->error($ficha_usuario,'direccion'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'piso'); ?>
	            <?php echo $form->textField($ficha_usuario,'piso',array('class'=>"form-control",'placeholder'=>"¿Vivís en un piso?")); ?>
                <?php echo $form->error($ficha_usuario,'piso'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_usuario,'depto'); ?>
	            <?php echo $form->textField($ficha_usuario,'depto',array('class'=>"form-control",'placeholder'=>"¿Vivís en un departamento?")); ?>
	            <?php echo $form->error($ficha_usuario,'depto'); ?>
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
        </form>
>>>>>>> 90488ca3f54e18352714ca3097f451de8a5ce6f8
<?php $this->endWidget(); ?>

</div><!-- form -->