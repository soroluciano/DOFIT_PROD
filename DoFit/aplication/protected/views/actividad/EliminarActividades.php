<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $usuarioins = Institucion::model()->findByPk(Yii::app()->user->id);
}

?>

<style type="text/css">
    body {
        background: url(../img/23.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>


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
                <li><a href="">Bienvenido! re puto!</a></li>
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
<?php
$listaActividades = Yii::app()->db->createCommand("select a.id_actividad,d.deporte,ao.hora,ao.minutos,ao.id_dia,fi.nombre from actividad a inner join actividad_horario ao on a.id_actividad=ao.id_actividad inner join actividad_alumno al  on a.id_actividad = al.id_actividad inner join institucion i on a.id_institucion=i.id_institucion inner join ficha_institucion fi on i.id_institucion=fi.id_institucion inner join deporte d on a.id_deporte=d.id_deporte where a.id_usuario=1 or al.id_usuario=1")->queryAll();
$respuesta="
<select class='form-control' style='margin-top:5px;' id='sel1'>
    <option>Compartir con...</option>";

    foreach($listaActividades as $act ){
    $dia;
    switch($act['id_dia']){
    case 1:{
    $dia="Lunes";
    }
    case 2:{
    $dia="Martes";
    }
    case 3:{
    $dia="Miercoles";
    }
    case 4:{
    $dia="Jueves";
    }
    case 5:{
    $dia="Viernes";
    }
    case 6:{
    $dia="Sabado";
    }
    case 7:{
    $dia="Domingo";
    }

    }

    $respuesta.="<option id='".$act['id_actividad']."'><a href='#'>".$act['deporte']."-".$act['nombre']."-".$dia."(".$act['hora'].":".$act['minutos']." hs".")</a></li>";
    }
    $respuesta.="</select>";

    echo $respuesta;
?>
