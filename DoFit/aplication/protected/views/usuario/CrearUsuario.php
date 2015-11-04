<style type="text/css">
    body {
        background: url(../img/18.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><a href="../site/login">&times;</a></span></button>
                <h4 class="modal-title">Registrate, es gratis!</h4>
            </div>
            <div class="container">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'usuario-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
                    <br>
                    <div class="col-xs-6 col-sm-3">

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
                            <?php echo $form->textField($model,'email',array('name'=>'email','class'=>"form-control",'placeholder'=>"Tu email",'id'=>"email",'size'=>60,'maxlength'=>60)); ?>
                            <div class="form-group has-error" id="err_mail">
                                <label class="control-label" for="inputError" id="email">Ingrese un mail.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'password'); ?>
                            <?php echo $form->passwordField($model,'password',array('id'=>'password','name'=>'password','class'=>"form-control",'placeholder'=>"Elegí una contraseña",'maxlength'=>15));?>
                            <div class="form-group has-error" id="err_pass">
                                <label class="control-label" for="inputError" id="pass">Ingrese una contraseña.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'Perfil'); ?>
                            <div>
                                <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'¿Sos alumno o profesor?','class'=>"form-control",'name'=>'id_perfil','id'=>'id_perfil'));?>
                            </div>
                            <?php echo $form->error($model,'id_perfil',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'nombre'); ?>
                            <?php echo $form->textField($ficha_usuario,'nombre',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu nombre")); ?>
                            <?php echo $form->error($ficha_usuario,'nombre',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'apellido'); ?>
                            <?php echo $form->textField($ficha_usuario,'apellido',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu apellido")); ?>
                            <?php echo $form->error($ficha_usuario,'apellido',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'dni'); ?>
                            <?php echo $form->textField($ficha_usuario,'dni',array('size'=>8,'maxlength'=>8,'class'=>"form-control",'placeholder'=>"Tu dni")); ?>
                            <?php echo $form->error($ficha_usuario,'dni',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'sexo'); ?>
                            <div>
                                <?php echo $form->dropDownList($ficha_usuario,'sexo',array('empty'=>'¿Mujer u Hombre?','M'=>'Masculino','F'=>'Femenino','O'=>'Otro'),array('class'=>"form-control")); ?>
                            </div>
                            <?php echo $form->error($ficha_usuario,'sexo'); ?>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'fechanac'); ?>
                            <?php echo $form->dateField($ficha_usuario,'fechanac',array('class'=>"form-control",'placeholder'=>"dd/mm/yyyy")); ?>
                            <?php echo $form->error($ficha_usuario,'fechanac',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'telfijo'); ?>
                            <?php echo $form->textField($ficha_usuario,'telfijo',array('class'=>"form-control",'placeholder'=>"Tu teléfono fijo")); ?>
                            <?php echo $form->error($ficha_usuario,'telfijo'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'conemer'); ?>
                            <?php echo $form->textField($ficha_usuario,'conemer',array('class'=>"form-control",'placeholder'=>"Nombre del contacto por emergencia")); ?>
                            <?php echo $form->error($ficha_usuario,'conemer'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'telemer'); ?>
                            <?php echo $form->textField($ficha_usuario,'telemer',array('class'=>"form-control",'placeholder'=>"Teléfono del contacto por emergencia")); ?>
                            <?php echo $form->error($ficha_usuario,'telemer'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'direccion'); ?>
                            <?php echo $form->textField($ficha_usuario,'direccion',array('class'=>"form-control",'placeholder'=>"Tu dirección")); ?>
                            <?php echo $form->error($ficha_usuario,'direccion',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'depto'); ?>
                            <?php echo $form->textField($ficha_usuario,'depto',array('class'=>"form-control",'placeholder'=>"¿Vivís en un departamento?")); ?>
                            <?php echo $form->error($ficha_usuario,'depto'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'piso'); ?>
                            <?php echo $form->textField($ficha_usuario,'piso',array('class'=>"form-control",'placeholder'=>"¿En qué piso?")); ?>
                            <?php echo $form->error($ficha_usuario,'piso'); ?>
                        </div>
                        <div class="form-group">
                            <br>
                            <div class="text-center">
                                <?php echo CHtml::Button($model->isNewRecord ? 'Registrate!': 'Save',array('onclick'=>'enviardatos();','id'=>'enviar','class'=>'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($localidad,'Provincia'); ?>
                            <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
                                array('ajax'=>array('type'=>'POST',
                                    'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
                                    'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),
                                ),'prompt'=>'Seleccione tu Provincia','class'=>"form-control"));?>
                            <?php echo $form->error($localidad,'id_provincia'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($localidad,'Localidad'); ?>
                            <div>
                                <?php echo $form->dropDownList($localidad,'id_localidad',array('empty'=>"Selecciona tu localidad"),array('class'=>"form-control")); ?>
                            </div>
                            <?php echo $form->error($localidad,'id_localidad'); ?>
                        </div>
                    </div>
                </div> <!-- form -->
            </div>
        </div>
    </div>
</div>


<?php
echo"<div class='modal fade' id='mensajeregistrook' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
		    <div class='modal-dialog' role='document'>
			    <div class='modal-content'>
			        <div class='modal-header'>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				        <span aria-hidden='true'>&times;</span>
				        </button>
					     <h4 class='modal-title' id='myModalLabel'>Registro Usuario</h4>
				    </div>
				    <div class='modal-body'>
				       Se envio un mail a su cuenta para activarla.
				    </div>
			        <div class='modal-footer'>
				       <button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
				    </div>
			    </div>
		    </div>
		</div>";?>

<?php $this->endWidget(); ?>


<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show');
        $('#err_mail').hide();
        $('#err_pass').hide();
    });
</script>

<script type="text/javascript">
    function enviardatos(){
        var enviar = $('#enviar').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var id_perfil = $('#id_perfil').val();
        var nombre = $('#FichaUsuario_nombre').val();
        var apellido = $('#FichaUsuario_apellido').val();
        var dni = $('#FichaUsuario_dni').val();
        var sexo = $('#FichaUsuario_sexo').val();
        var fechanac = $('#FichaUsuario_fechanac').val();
        var telfijo = $('#FichaUsuario_telfijo').val();
        var conemer = $('#FichaUsuario_conemer').val();
        var telemer = $('#FichaUsuario_telemer').val();
        var direccion = $('#FichaUsuario_direccion').val();
        var piso = $('#FichaUsuario_piso').val();
        var depto = $('#FichaUsuario_depto').val();
        var localidad = $('#Localidad_id_localidad').val();
        var provincia = $('#Localidad_id_provincia').val();
        var data = {"enviar": enviar,"email": email, "password": password, "id_perfil": id_perfil, "nombre": nombre,"apellido": apellido,"dni": dni, "sexo": sexo, "fechanac": fechanac, "telfijo": telfijo, "conemer": conemer, "telemer": telemer,"direccion": direccion, "piso": piso, "depto": depto, "localidad":localidad, "provincia": provincia};
        $.ajax({
            url :  baseurl + '/usuario/Create',
            type: "POST",
            data : data,
            dataType : "html",
            cache: false,
            success: function(response) {
                res = response.split("/");
                if(res[0] == "err_mail"){
                    $('#err_mail').show();
                    $('#email').css("border-color","#a94442");
                }
                else{
                    $('#err_mail').hide();
                    $('#email').removeAttr('style');
                }
                if(res[1] == "err_pass"){
                    $('#err_pass').show();
                    $('#password').css("border-color","#a94442");
                }
                else{
                    $('#err_pass').hide();
                    $('#password').removeAttr('style');
                }
                if(response == "actusuok"){
                    $('#mensajeregistrook').modal('show');
                }
            } ,
            error: function (e) {
                console.log(e);
            }
        });
    }
</script>