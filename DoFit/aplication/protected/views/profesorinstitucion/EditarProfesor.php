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
                        <a href='../institucion/home'> <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <div class="navbar-form navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="active"><a>Bienvenido! <?php echo $fichains->nombre;?></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="../ProfesorInstitucion/ListadoProfesores">Ver listado de Profesores</a></li>
                                        <li><a href="../institucion/ListadoAlumnosxInstitucion">Ver listado de Alumnos</a></li>
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
                <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/17.jpg" alt="First slide">
            </div>
        </div>
    </div>
    <div class="container">
    <div class='row'>
    <div>
        <h1>Modificar datos personales de <?php echo $ficha_profesor->nombre."&nbsp";?><?php echo $ficha_profesor->apellido;?></h1>
    </div>
    <?php echo CHtml::beginForm('EditarProfesor','post'); ?>
    <input type="hidden" value="<?php echo $idprofesor?>" name="idprofesor"></input>
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'Profesor', 'enableAjaxValidation'=>true, 'enableClientValidation'=>false, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'nombre'); ?>
                <?php echo $form->textField($ficha_profesor,'nombre',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"nombre")); ?>
                <?php echo $form->error($ficha_profesor,'nombre'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'apellido'); ?>
                <?php echo $form->textField($ficha_profesor,'apellido',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"apellido")); ?>
                <?php echo $form->error($ficha_profesor,'apellido'); ?>
            </div>
			<div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'Actividades que dicta'); ?>
				<?php 
				foreach($actividad as $act){
				     echo $form->dropDownList($act,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('class'=>"form-control"));
				     echo "<br/>";
				  }	
				?>					
			</div>
			<div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'sexo'); ?>
                <div>
                    <?php echo $form->dropDownList($ficha_profesor,'sexo',array('empty'=>'¿Mujer u Hombre?','M'=>'Masculino','F'=>'Femenino','O'=>'Otro'),array('class'=>"form-control")); ?>
                </div>
                <?php echo $form->error($ficha_profesor,'sexo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'telfijo'); ?>
                <?php echo $form->textField($ficha_profesor,'telfijo',array('class'=>"form-control",'placeholder'=>"Telefono")); ?>
                <?php echo $form->error($ficha_profesor,'telfijo'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'celular'); ?>
                <?php echo $form->textField($ficha_profesor,'celular',array('class'=>"form-control",'placeholder'=>"Celular")); ?>
                <?php echo $form->error($ficha_profesor,'celular'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'direccion'); ?>
                <?php echo $form->textField($ficha_profesor,'direccion',array('class'=>"form-control",'placeholder'=>"Dirección")); ?>
                <?php echo $form->error($ficha_profesor,'direccion'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'piso'); ?>
                <?php echo $form->textField($ficha_profesor,'piso',array('class'=>"form-control",'placeholder'=>"Piso")); ?>
                <?php echo $form->error($ficha_profesor,'piso'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($ficha_profesor,'depto'); ?>
                <?php echo $form->textField($ficha_profesor,'depto',array('class'=>"form-control",'placeholder'=>"Departamento")); ?>
                <?php echo $form->error($ficha_profesor,'depto'); ?>
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
                <?php echo CHtml::submitButton('Modificar Datos',array('class'=>'btn btn-primary')); ?>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>