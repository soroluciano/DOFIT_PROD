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
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../site/LoginInstitucion"><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../ProfesorInstitucion/ListadoProfesores">Listado de Profesores</a>
                </li>
                <li>
                    <a href="../institucion/ListadoAlumnosxInstitucion">Listado de Alumnos</a>
                </li>
                <li>
                    <a href="../actividad/CrearActividad">Crear Actividades</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Bienvenido! <?php echo $fichains->nombre; ?></a></li>
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
            </ul>
        </nav>
    </div>
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2><a href="../pago/index" class="btn btn-primary">Pagos</a></h2>
            <p>Gestioná los pagos de tus alumnos</a></p>
        </div>
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/2.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2><a href="../actividad/CrearActividad" class="btn btn-primary">Actividades</a></h2>
            <p>Gestioná las actividades de tu institución</p>
        </div>
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/3.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>¿No sabés cómo funciona?</h2>
            <p>Hacé click <a href="#">acá</a> para ver como funciona de DoFit. </p>
        </div>
    </div>
</div>
<br>
<br>

<div class="container">
<?php
    echo  "<div><h2>Profesores que se quieren unir a tu gimnasio</h2></div>";
    if($profesor_pen != null){
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
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
                            <h5 class='text-center'>No hay solicitud de profesores</h5>
                        </div>
                    </div>";
    }
?>
<br>
<br>
<br>
<?php
    echo  "<div><h2>Alumnos que se anotaron en actividades</h2></div>";
    if($actividades_pen != null){
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Actividad</th>
                            </tr>
                        </thead>";
        foreach($actividades_pen as $a){
            $fua = FichaUsuario::model()->findAll('id_usuario=:id_usuario',array(':id_usuario'=>$a->id_usuario));
            $actividad = Actividad::model()->findByPk($a->id_actividad);
            $deporte = Deporte::model()->findByPk($actividad->id_deporte);

            $actividad_horario = ActividadHorario::model()->findAll('id_actividad = :id',array(':id'=>$a->id_actividad));

            $var = $deporte->deporte. ' - ';

            foreach($actividad_horario as $ah){
                if($ah->id_dia == 1){$dia = "Lunes";};
                if($ah->id_dia == 2){$dia = "Martes";};
                if($ah->id_dia == 3){$dia = "Miercoles";};
                if($ah->id_dia == 4){$dia = "Jueves";};
                if($ah->id_dia == 5){$dia = "Viernes";};
                if($ah->id_dia == 6){$dia = "Sabado";};
                if($ah->id_dia == 7){$dia = "Domingo";};

                $var = $var . ' Dia: '.$dia. ' Horario: '.str_pad($ah->hora,2,'0',STR_PAD_LEFT).':'.str_pad($ah->minutos,2,'0',STR_PAD_LEFT);
            }


            foreach($fua as $t){
                echo "<tbody>
                                <tr>
                                    <td>$t->nombre</td>
                                    <td>$t->apellido</td>
                                    <td>$var</td>
                                    <td><a href='../actividadAlumno/AceptarAlumno/$t->id_usuario' class='btn btn-default'>Aceptar<a/></td>
                                    <td><a href='../actividadAlumno/CancelarAlumno/$t->id_usuario' class='btn btn-default'>Cancelar<a/></td>";
            }

        }
        echo "</tr></tbody>";
        echo "</table>";
    }
    else
    {
        echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h5 class='text-center'>No hay solicitud de inscripción a actividades</h5>
                        </div>
                    </div>";
    }
    ?>


</div>
