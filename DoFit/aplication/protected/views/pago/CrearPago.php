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
            <?php   $criteria = new CDbCriteria;
                    $criteria->condition = 'id_usuario IN (select id_usuario from actividad_alumno where id_actividad IN ( select id_actividad from actividad where id_institucion = :institucion ))';
                    $criteria->params = array(':institucion' => 1 );
                    $usuario = FichaUsuario:: model()->findAll($criteria);?>
            <?php   echo $form->labelEx($ficha_usuario,'Alumno'); ?>
            <?php   echo $form->dropDownList($ficha_usuario,'id_usuario',CHtml::listData(FichaUsuario:: model()->findAll($criteria),'id_usuario','nombre'),
                                            array('ajax'=>array('type'=>'POST',
                                                  'url'=>CController::createUrl('Pago/SeleccionarActividad'),
                                                  'update'=>'#'.CHtml::activeId($actividad,'id_actividad'),
                                                  ),'prompt'=>'Seleccione un alumno','class'=>"form-control"));?>
            <?php   echo $form->error($ficha_usuario,'Alumno')?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($actividad,'actividad'); ?>
                <div>
                    <?php echo $form->dropDownList($actividad,'id_actividad',
                                                   array(''=>"Selecciona actividad"),
                                                   array('class'=>"form-control",'data-tooggle'=>"collapse",'role'=>"button",'href'=>"#collapseExample",'aria-expanded'=>"false",'aria-controls'=>"collapseExample","onchange"=>"a();")); ?>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            ...
                        </div>
                    </div>
                 </div>
                <?php echo $form->error($actividad,'id_actividad'); ?>
            </div>
            <div class="form-group">
                <?php $anio = date("Y"); ?>
                <?php echo $form->labelEx($pago,'Anio'); ?>
                <?php echo $form->dropDownList($pago,'anio',array(
                    ""=>"Seleccione el año",
                    $anio-3=>$anio-3,
                    $anio-2=>$anio-2,
                    $anio-1=>$anio-1,
                    $anio  =>  $anio,
                    $anio+1=>$anio+1),array('class'=>"form-control",'name'=>'anio[]'));?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($pago,'Mes'); ?>
                <?php echo $form->dropDownList($pago,'anio',array(
                        ""=>"Seleccione el mes",
                        "1"=>"Enero",
                        "2"=>"Febrero",
                        "3"=>"Marzo",
                        "4"=>"Abril",
                        "5"=>"Mayo",
                        "6"=>"Junio",
                        "7"=>"Julio",
                        "8"=>"Agosto",
                        "9"=>"Septiembre",
                        "10"=>"Octubre",
                        "11"=>"Noviembre",
                        "12"=>"Diciembre",),array('class'=>"form-control",'name'=>'meses[]'));?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($actividad,'Monto Abonado'); ?>
                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <?php echo $form->textField($actividad,'valor_actividad',array('class'=>"form-control",'placeholder'=>"Monto"));?>
                    <div class="input-group-addon">.00</div>
                </div>
                <br>
                <?php echo $form->error($actividad,'valor_actividad')?>
            </div>

            <button type="button" name="button" class="btn btn-primary" onclick="Crear();">Crear</button>

            <!-- Modal OK -->
            <div class='modal fade' id='Ok' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' id='myModalLabel'>Felicidades</h4>
                        </div>
                        <div class='modal-body'>
                            ¡Has generado el pago!
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
                            No se ha generado el pago debido a un error.
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Duplicado -->
            <div class='modal fade' id='Duplicado' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' id='myModalLabel'>¡Error!</h4>
                        </div>
                        <div class='modal-body'>
                            Pago duplicado. Verifique.
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

        function a(){
            var valor = $('#Actividad_id_actividad').val();
            alert(valor);
            if(valor != ""){
                var data = {'valor':valor};
                $.ajax({
                    url: baseurl + '/pago/VerificarActividad',
                    type: "POST",
                    data: data,
                    dataType: "html",
                    cache: false,
                    success: function (response) {
                        alert(response);

                        }

                })
            }
        }

 </script>
<script type="text/javascript">
    function Crear(){
        var id_usuario = $('#FichaUsuario_id_usuario').val();
        var actividad  = $('#Actividad_id_actividad').val();
        var anio  = $('#anio').val();
        var meses = $('#meses').val();
        var monto = $('#Actividad_valor_actividad').val();

        if(id_usuario != ""){
            if(actividad!= ""){
                if(anio != ""){
                    if(meses != ""){
                        if(monto != "") {
                            var data = {'id_usuario': id_usuario, 'actividad': actividad, 'anio': anio, 'meses': meses, 'monto': monto};
                            $.ajax({
                                url: baseurl + '/pago/CrearPago',
                                type: "POST",
                                data: data,
                                dataType: "html",
                                cache: false,
                                success: function (response) {
                                    if (response == 'ok') {
                                        $('#Ok').modal('show');
                                    }

                                    else {
                                        if(response == 'error'){
                                            $('#Error').modal('show');
                                        }
                                        else
                                        {
                                            $('#Duplicado').modal('show');
                                        }

                                    }
                                }
                            })
                        }
                    }
                }
            }
        }
    }




</script>