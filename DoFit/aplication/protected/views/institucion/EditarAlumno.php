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
        <div class='form-group'>
            <div>
                <h3>Modificar actividades de <?php echo $ficha_alumno->nombre."&nbsp";?><?php echo $ficha_alumno->apellido."&nbsp";?>
                    <?php echo "- Dni:&nbsp;". $ficha_alumno->dni?></h3>
            </div>
            <input type="hidden" value="<?php echo $idalumno?>" name="idalumno"></input>
            <div class="form">
                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'alumno', 'enableAjaxValidation'=>true, 'enableClientValidation'=>false, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
                <div class="col-md-8">
                    <?php echo CHtml::beginForm('EditarAlumno','post'); ?>
                    <div class="form-group">
                        <div><h4> Actividades que pr&aacute;ctica</h4></div>
                        <?php

                        $idinstitucion = Yii::app()->user->id;
                        if($actividad_alumno == NULL){
                            echo "<br/>";
                            echo "El alumno no se anoto en ninguna actividad";
                        }
                        else
                        {
                            $actividad = Actividad::model()->findAllByAttributes(array('id_institucion'=>$idinstitucion));

                            foreach($actividad_alumno as $actalum){
                                echo "<select id='deportes' name='actividad[]' class='form-control'>";
                                foreach($actividad as $act){
                                    $deporte =Deporte::model()->findByAttributes(array('id_deporte'=>$act->id_deporte));
                                    echo "<option value='$act->id_actividad'>$deporte->deporte</option>";
                                    echo "<br/>";

                                }
                                echo "</select>";
                            }
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::submitButton('Modificar actividades',array('class'=>'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>