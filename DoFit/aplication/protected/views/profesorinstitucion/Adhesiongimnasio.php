<?php if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $Us = Usuario::model()->findByPk(Yii::app()->user->id);
    $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
}
?>
<html>
<head>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet"></link>
</head>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Bienvenido! <?php echo $ficha->nombre ."&nbsp".$ficha->apellido; ?></a></li>
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
            </ul>
        </nav>
    </div>
</header>
<style type="text/css">
    body {
        background: url(../img/futbol.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<?php if(isset(Yii::app()->session['id_usuario'])){?>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="principal" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adhirete a un gimnasio como profesor!</h4>
                </div>
                <div class="container">
                    <div class="form">
                        <div class="col-md-8">
                            <div class="form-group">
                                <br/>
                                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'usuario-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
                                <?php echo $form->labelEx($localidad,'Provincia'); ?>
                                <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
                                    array('ajax'=>array('type'=>'POST',
                                        'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
                                        'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),
                                    ),'prompt'=>'Seleccione tu Provincia','class'=>"form-control"));?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($localidad,'Localidad'); ?>
                                <div>
                                    <?php echo $form->dropDownList($localidad,'id_localidad',array('empty'=>"Selecciona tu localidad"),array('class'=>"form-control",'onchange'=>"ConsultarInstituciones();")); ?>
                                </div>
                                <br/>
                                <div class="form-group" id="mostrargimnasios">
                                </div>
                                <br/>
                                <a href="../site/index" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Exito !-->
    <div class='modal fade' id='solicitudok' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'>¡Felicidades!</h4>
                </div>
                <div class='modal-body'>
                    Se envio la solicitud correctamente.
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal' onclick='location.reload();'>Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Error !-->
    <div class='modal fade' id='solicituderror' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'>¡Error!</h4>
                </div>
                <div class='modal-body'>
                    Hubo un error al enviar la solicitud a la Instituci&oacute;n.
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Error busqueda !-->
    <div class='modal fade' id='errorbusqueda' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'>¡Error!</h4>
                </div>
                <div class='modal-body'>
                    No se encontro ninguna institución para la provincia y localidad solicitada.
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' data-dismiss='modal' onclick="Resetarprovloc();">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
}
else
{
    $this->render('../site/login');
}
$this->endWidget();?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#principal').modal('show');
    });
</script>

<script type="text/javascript">
    function ConsultarInstituciones()
    {
        $('#mostrargimnasios').empty();
        var localidad = $('#Localidad_id_localidad').val();
        var data = {'localidad':localidad};
        $.ajax({
            url: baseurl + '/profesorinstitucion/MostrarInstituciones',
            type: "POST",
            data: data,
            dataType: "html",
            cache : false,
            success : function(response){
                if(response == "errorbusqueda"){
                    $("#errorbusqueda").modal('show');

                }
                else {
                    $('#mostrargimnasios').append(response);
                }
            }
        })
    }
</script>
<script type="text/javascript">
    function Enviarsolicitud(id_institucion)
    {
        var id_institucion = id_institucion;
        var data = {'id_institucion':id_institucion};
        $.ajax({
            url: baseurl + '/profesorinstitucion/EnviarSolicitud',
            type: "POST",
            data: data,
            dataType: "html",
            cache : false,
            success : function(response){
                if(response == "solicitudok"){
                    $('#solicitudok').modal('show');
                }
                if(response == "solicituderror"){
                    $("#solicituderror").modal('show');
                }
            }
        })
    }
</script>
<script type="text/javascript">
    function Resetarprovloc()
    {
        $('#Localidad_id_provincia').val("");
        $('#Localidad_id_localidad').val("");
    }
</script> 