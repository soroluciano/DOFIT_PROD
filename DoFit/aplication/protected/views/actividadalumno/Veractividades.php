
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
        <?php

        if($actividades_alumno != null) {
            echo "<table class='table table-hover'>
	            <thead>
		          <tr><th>Deporte</th><th>Día</th><th>Hora</th><th>Valor actividad</th><th>Desafectar actividad</th></tr>
		        </thead>
		        <tbody>";
            foreach ($actividades_alumno as $act_alum) {
                echo "<tr>";
                $act = Actividad::model()->findByAttributes(array('id_institucion' => $ins->id_institucion, 'id_actividad' => $act_alum->id_actividad));
                if ($act != null) {
                    $deporte = Deporte::model()->findByAttributes(array('id_deporte' =>$act->id_deporte));
                    echo "<td id='depo'>$deporte->deporte</td>";
                    $act_hor = ActividadHorario::model()->findByAttributes(array('id_actividad' => $act->id_actividad));
                    $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                    $id_dia = $act_hor->id_dia;
                    echo "<td id='dia'>$dias[$id_dia]</td>";
                    ?>
                    <td id='hora'><?php echo $act_hor->hora.':'.($act_hor->minutos == '0' ? '0'.$act_hor->minutos : $act_hor->minutos);?></td>
                    <td id='valor'><?php echo  $act->valor_actividad;?></td>
                    <td id='elim'><a href='../desafectaractividad?id_usuario=<?php echo $act_alum->id_usuario;?>'>Desafectar actividad</a></td>
                    <?php
                }
                echo "</tr>";
            }
            echo "</tbody>
	           </table>";
        }
        else
        {
            echo "<h3>El usuario no se inscribio en ninguna actividad</h3><br/>";
        }
        ?>
    </div>
</div>
			   