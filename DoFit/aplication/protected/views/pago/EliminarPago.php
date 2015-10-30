<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $usuarioins = Institucion::model()->findByPk(Yii::app()->user->id);
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
<div id="myCarousel" class="carousel_min slide" data-ride="carousel">
    <div class="carousel-inner_min" role="listbox">
        <div class="item active">
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/16.jpg" alt="First slide">
        </div>
    </div>
</div>

<div class="container">
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'pago-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <?php echo CHtml::beginForm('InscripcionActividad','post'); ?>
            <div class="form-group">
                <?php
                $criteria = new CDbCriteria;
                $criteria->condition = 'id_usuario IN (select id_usuario from actividad_alumno where id_actividad IN ( select id_actividad from actividad where id_institucion = :institucion ))';
                $criteria->params = array(':institucion' => 1 );
                $usuario = FichaUsuario:: model()->findAll($criteria);?>
                <?php   echo $form->labelEx($ficha_usuario,'Alumno'); ?>
                <?php   echo $form->dropDownList($ficha_usuario,'id_usuario',CHtml::listData(FichaUsuario:: model()->findAll($criteria),'id_usuario','nombre'),array("class"=>"form-control",'prompt'=>'Seleccione un alumno'));?>
                <?php   echo $form->error($ficha_usuario,'Alumno')?>
            </div>

            <div class="form-group">
                <?php   echo $form->labelEx($pago,'Anio'); ?>
                <?php   echo $form->dropDownList($pago,'anio',CHtml::listData(Pago:: model()->findAll(),'anio','anio'),array("class"=>"form-control",'prompt'=>'Seleccione el año',"onchange"=>"lista_pagos();"));?>
                <?php   echo $form->error($pago,'anio')?>
            </div>


            <div id="lista">

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
                            ¡Has eliminado el pago!
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
                            No se ha eliminado el pago debido a un error.
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <?php $this->endWidget(); ?>

        </div>
    </div>


<script type="text/javascript">
    function lista_pagos(){
        var usuario = $('#FichaUsuario_id_usuario').val();
        var anio    = $('#Pago_anio').val();
        $('#lista').html("");
        if(usuario != ""){
            if(anio != "") {
                var data = {'usuario': usuario, 'anio': anio};
                $.ajax({
                    url: '../pago/ListarPagos',
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        var html = "<table class='table table-bordered'><thead><tr><th>Actividad</th><th>Año</th><th>Mes</th><th>Monto</th></thead><tbody>";
                        for (i = 0; i < response.length; i++) {
                            html += "<tr><td>" + response[i].actividad + "</td><td>" + response[i].anio + "</td><td>" + response[i].mes + "</td><td>" + response[i].monto + "</td><td><input type='button' value ='Eliminar' onclick='eliminar_pago();' class='btn btn-primary' id='boton' name='"+ response[i].id +"' /></td><tr>";
                        }
                        html += "</tbody></table>";
                        $('#lista').html(html);

                    }, error: function (e) {
                        console.log(e);
                    }
                });
            }
        }
    }
</script>
    <script type="text/javascript">
        function eliminar_pago() {
            var pago = $('#boton').prop("name");
            if (pago != "") {
                var data = {'id': pago};
                $.ajax({
                    url: '../pago/Eliminar',
                    type: 'POST',
                    data: data,
                    dataType: "html",
                    cache: false,
                    success: function (response) {
                        if (response == "ok") {
                            $('#Ok').modal('show');
                        }
                        else {
                            $('#Error').modal('show');
                        }
                    }

                })
            }
        }
</script>
