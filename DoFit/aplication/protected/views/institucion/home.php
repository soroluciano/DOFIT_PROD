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
                    <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Bienvenido! <?php echo $fichains->nombre; ?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="../ProfesorInstitucion/ListadoProfesores">Ver listado de Profesores</a></li>
                                    <li><a href="../institucion/ListadoAlumnosxInstitucion">Ver listado de Alumnos</a></li>
                                    <li><a href="../actividad/CrearActividad">Crear Actividades</a></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/14.png" alt="First slide">
        </div>
    </div>
</div>
<div>
    <div>
        <label>
            Pagos
        </label>
        <?php echo CHtml::beginForm('../pago/index','post'); ?>
        <?php echo CHtml::submitButton('Generar pagos',array('class'=>'btn btn-primary')); ?>
        <?php echo CHtml::endForm(); ?>

    </div>
    <div class="form-group">
        <div><label>Actividades</label></div>
        <?php echo CHtml::beginForm('../actividad/CrearActividad','post'); ?>
        <?php echo CHtml::submitButton('Crear Actividad',array('class'=>'btn btn-primary')); ?>
        <?php echo CHtml::endForm(); ?></div>

    <?php
    echo  "<div><label> Solicitud de adhesion a Profesores</label></div>";
    if($profesor_pen != null){
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>.</th>
                                <th>.</th>
                            </tr>
                        </thead>";
        foreach($profesor_pen as $f){
            $fu = FichaUsuario::model()->findAll('id_usuario=:id_usuario',array(':id_usuario'=>$f->id_usuario));
            foreach($fu as $p){
                echo "<tbody>
                                <tr>
                                    <td>$p->nombre</td>
                                    <td>$p->apellido</td>
                                    <td><a href='../institucion/aceptar/$p->id_usuario' class='btn btn-default'>Aceptar<a/></td>
                                    <td><a href='../institucion/cancelar/$p->id_usuario' class='btn btn-default'>Cancelar<a/></td>";
            }

        }
        echo "</tr></tbody>";
        echo "</table>";
    }
    else
    {
        echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay solicitud de profesores</h2>
                        </div>
                    </div>";
    }
    ?>
    <?php
    echo  "<div><label>Inscripción de alumnos a actividades</label></div>";
    if($actividades_pen != null){
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>.</th>
                                <th>.</th>
                            </tr>
                        </thead>";
        foreach($actividades_pen as $a){
            $fua = FichaUsuario::model()->findAll('id_usuario=:id_usuario',array(':id_usuario'=>$a->id_usuario));
            foreach($fua as $t){
                echo "<tbody>
                                <tr>
                                    <td>$t->nombre</td>
                                    <td>$t->apellido</td>
                                    <td><a href='../actividadAlumno/aceptar/$t->id_usuario' class='btn btn-default'>Aceptar<a/></td>
                                    <td><a href='../actividadAlumno/cancelar/$t->id_usuario' class='btn btn-default'>Cancelar<a/></td>";
            }

        }
        echo "</tr></tbody>";
        echo "</table>";
    }
    else
    {
        echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay solicitud de inscripción a actividades</h2>
                        </div>
                    </div>";
    }
    ?>


</div>
