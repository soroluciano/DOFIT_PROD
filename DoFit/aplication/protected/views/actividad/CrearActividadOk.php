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



<div class='modal fade' id='ModalVentana' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>¡Felicitaciones!</h4>
            </div>
            <div class='modal-body'>
                <p>Has creado correctamente la actividad.</p>
            </div>
            <div class='modal-footer'>
                <a href="CrearActividad" class='btn btn-primary' >Cerrar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#principal').modal('show');
        $('#ModalVentana').modal('show');
    });

</script>