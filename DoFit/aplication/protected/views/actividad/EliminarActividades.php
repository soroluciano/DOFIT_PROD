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

<div class="modal fade" tabindex="-1" role="dialog" id="principal" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Actividad</h4>
            </div>
            <div class="container">
                <div class="form">
                    <div class="col-md-6">
                        <br>
                        <div class="form-group">
                            <?php
                            $query = "select actividad.id_actividad, concat(ficha_usuario.nombre,' ',ficha_usuario.apellido) profesor, deporte.deporte from actividad, ficha_usuario, deporte where actividad.id_usuario = ficha_usuario.id_usuario and actividad.id_deporte = deporte.id_deporte and actividad.id_institucion = ".Yii::app()->user->id;
                            $listaActividades = Yii::app()->db->createCommand($query)->queryAll();
                            $respuesta=" <select class='form-control' style='margin-top:5px;' id='actividades' name='options'>
                                         <option id='0'>Selecciona actividad</option>";
                                         foreach($listaActividades as $act ){
                                             $query_horario = "select CASE id_dia WHEN 1 THEN 'Lunes' WHEN 2 THEN 'Martes' WHEN 3 THEN 'Miercoles' WHEN 4 THEN 'Jueves' WHEN 5 THEN 'Viernes' WHEN 6 THEN 'Sabado' WHEN 7 THEN 'Domingo' END dia,concat(lpad(hora,2,'0'),':',lpad(minutos,2,'0'))horario from actividad_horario where id_actividad = ".$act['id_actividad'];
                                             $horario = Yii::app()->db->createCommand($query_horario)->queryAll();
                                             $hora = "";
                                             foreach($horario as $h) {
                                                 $hora = $hora . ' - '.$h['dia'].' - '.$h['horario'];
                                             }
                                             $respuesta.="<option id='".$act['id_actividad']."'><a href='#'>".$act['profesor']." - ".$act['deporte'].$hora."</a></option>";
                                         }
                            $respuesta.="</select>";
                            echo $respuesta;
                            ?>
                            <br>
                            <button  onclick='Eliminar();' class='btn btn-primary' id='boton'>Eliminar Actividad</button>
                            <a href="index" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='error' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>¡Oops!</h4>
            </div>
            <div class='modal-body' id="modal-error">
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal OK -->
<div class='modal fade' id='Ok' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>Felicidades</h4>
            </div>
            <div class='modal-body'>
                ¡Has eliminado la actividad correctamente!
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Error -->
<div class='modal fade' id='Error' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>¡Error!</h4>
            </div>
            <div class='modal-body'>
                No se ha podido eliminar la actividad :(
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#principal').modal('show');
    })
</script>

<script type="text/javascript">
    function Eliminar(){
        var actividad = $('#actividades option:selected').attr("id");
        if(actividad != 0){
            var data = {'actividad': actividad};
            $.ajax({
                    url: '../actividad/Eliminar',
                    type: 'POST',
                    data: data,
                    dataType: "html",
                    cache: false,
                    success: function (response) {
                        if (response == "ok") {
                            $("#actividades").find('option:selected').removeAttr("selected");
                            $('#Ok').modal('show');

                        }
                        else {
                            $('#Error').modal('show');
                        }
        }})}
        else{
            $('#modal-error').html("¡Debe seleccionar al menos una actividad!");
            $('#error').modal('show');
        }
    }
</script>