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
                            <div class="form-group has-error" id="err_mail_vacio">
                                <label class="control-label" for="inputError" id="emailvacio">Ingrese un mail.</label>
                            </div>
                            <div class="form-group has-error" id="err_mail_exprreg">
                                <label class="control-label" for="inputError" id="mailexprreg">Ingrese una dirección de correo válida.</label>
                            </div>
                            <div class="form-group has-error" id="err_mail_dup">
                                <label class="control-label" for="inputError" id="maildup">El mail ya se encuentra registrado.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'password'); ?>
                            <?php echo $form->passwordField($model,'password',array('id'=>'password','name'=>'password','class'=>"form-control",'placeholder'=>"Elegí una contraseña",'maxlength'=>15));?>
                            <div class="form-group has-error" id="err_pass_vacio">
                                <label class="control-label" for="inputError" id="passvacio">Ingrese una contraseña.</label>
                            </div>
                            <div class="form-group has-error" id="err_pass_long">
                                <label class="control-label" for="inputError" id="passvacio">La contraseña debe tener entre 6 y 15 carácteres.</label>
                            </div>
                            <div class="form-group has-error" id="err_pass_exprreg">
                                <label class="control-label" for="inputError" id="passexpreg">La contraseña debe tener al menos una mayúscula y dos números.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'Perfil'); ?>
                            <div>
                                <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'¿Sos alumno o profesor?','class'=>"form-control",'name'=>'id_perfil','id'=>'id_perfil'));?>
                            </div>
                            <div class="form-group has-error" id="err_perfil_vacio">
                                <label class="control-label" for="inputError" id="perfilvacio">Seleccione un perfil.</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'nombre'); ?>
                            <?php echo $form->textField($ficha_usuario,'nombre',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu nombre")); ?>
                            <div class="form-group has-error" id="err_nombre_vacio">
                                <label class="control-label" for="inputError" id="nombrevacio">Ingrese un nombre.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'apellido'); ?>
                            <?php echo $form->textField($ficha_usuario,'apellido',array('size'=>200,'maxlength'=>200,'class'=>"form-control",'placeholder'=>"Tu apellido")); ?>
                            <div class="form-group has-error" id="err_apellido_vacio">
                                <label class="control-label" for="inputError" id="apellidovacio">Ingrese un apellido.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'dni'); ?>
                            <?php echo $form->textField($ficha_usuario,'dni',array('size'=>8,'maxlength'=>8,'class'=>"form-control",'placeholder'=>"Tu dni")); ?>
                            <div class="form-group has-error" id="err_dni_vacio">
                                <label class="control-label" for="inputError" id="dnivacio">Ingrese un número de documento.</label>
                            </div>
                            <div class="form-group has-error" id="err_dni_num">
                                <label class="control-label" for="inputError" id="dninum">El dato debe ser númerico.</label>
                            </div>
                            <div class="form-group has-error" id="err_dni_dupl">
                                <label class="control-label" for="inputError" id="dnidupl">El dni se encuentra registrado.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'sexo'); ?>
                            <div>
                                <?php echo $form->dropDownList($ficha_usuario,'sexo',array('empty'=>'¿Mujer u Hombre?','M'=>'Masculino','F'=>'Femenino','O'=>'Otro'),array('class'=>"form-control",'id'=>'sexo')); ?>
                            </div>
                            <div class="form-group has-error" id="err_sexo_vacio">
                                <label class="control-label" for="inputError" id="sexovacio">Seleccione un sexo.</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'fechanac'); ?>
                            <?php echo $form->dateField($ficha_usuario,'fechanac',array('class'=>"form-control",'placeholder'=>"dd/mm/yyyy")); ?>
                            <div class="form-group has-error" id="err_fechanac_vacia">
                                <label class="control-label" for="inputError" id="fecnac">Ingrese una fecha de nacimiento.</label>
                            </div>
                            <div class="form-group has-error" id="err_fechanac_valida">
                                <label class="control-label" for="inputError" id="fecnacvalid">Ingrese una fecha de nacimiento válida.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'telfijo'); ?>
                            <?php echo $form->textField($ficha_usuario,'telfijo',array('class'=>"form-control",'placeholder'=>"Tu teléfono fijo")); ?>
                            <div class="form-group has-error" id="err_telfijo_num">
                                <label class="control-label" for="inputError" id="telfijonum">El dato debe ser númerico.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'conemer'); ?>
                            <?php echo $form->textField($ficha_usuario,'conemer',array('class'=>"form-control",'placeholder'=>"Nombre del contacto por emergencia")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'telemer'); ?>
                            <?php echo $form->textField($ficha_usuario,'telemer',array('class'=>"form-control",'placeholder'=>"Teléfono del contacto por emergencia")); ?>
                            <div class="form-group has-error" id="err_telemer_num">
                                <label class="control-label" for="inputError" id="telemernum">El dato debe ser númerico.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'direccion'); ?>
                            <?php echo $form->textField($ficha_usuario,'direccion',array('class'=>"form-control",'placeholder'=>"Tu dirección")); ?>
                            <div class="form-group has-error" id="err_direccion_vacia">
                                <label class="control-label" for="inputError" id="dirvacia">Ingrese una dirección.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'depto'); ?>
                            <?php echo $form->textField($ficha_usuario,'depto',array('class'=>"form-control",'placeholder'=>"¿Vivís en un departamento?")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'piso'); ?>
                            <?php echo $form->textField($ficha_usuario,'piso',array('class'=>"form-control",'placeholder'=>"¿En qué piso?")); ?>
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
                            <div class="form-group has-error" id="err_prov_vacia">
                                <label class="control-label" for="inputError" id="provvacia">Seleccione una provinicia.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($localidad,'Localidad'); ?>
                            <div>
                                <?php echo $form->dropDownList($localidad,'id_localidad',array('empty'=>"Selecciona tu localidad"),array('class'=>"form-control")); ?>
                            </div>
                            <div class="form-group has-error" id="err_loc_vacia">
                                <label class="control-label" for="inputError" id="locvacia">Seleccione una localidad.</label>
                            </div>
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
        $('#err_mail_vacio').hide();
        $('#err_mail_exprreg').hide();
        $('#err_mail_dup').hide();
        $('#err_pass_vacio').hide();
        $('#err_pass_long').hide();
        $('#err_pass_exprreg').hide();
        $('#err_perfil_vacio').hide();
        $('#err_nombre_vacio').hide();
        $('#err_apellido_vacio').hide();
        $('#err_dni_vacio').hide();
        $('#err_dni_num').hide();
        $('#err_dni_dupl').hide();
        $('#err_sexo_vacio').hide();
        $('#err_fechanac_vacia').hide();
        $('#err_fechanac_valida').hide();
        $('#err_telfijo_num').hide();
        $('#err_telemer_num').hide();
        $('#err_direccion_vacia').hide();
        $('#err_prov_vacia').hide();
        $('#err_loc_vacia').hide();
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
        var sexo = $('#sexo').val();
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
                if(res[0] == "err_mail_vacio"){
                    $('#err_mail_vacio').show();
                    $('#email').css("border-color","#a94442");
                }
                else{
                    $('#err_mail_vacio').hide();
                    $('#email').removeAttr('style');
                }

                if(res[1] == "err_mail_exprreg"){
                    $('#err_mail_exprreg').show();
                    $('#email').css("border-color","#a94442");
                }
                else{
                    $('#err_mail_exprreg').hide();
                    $('#email').removeAttr('style');
                }
                if(res[2] == "err_mail_dup"){
                    $('#err_mail_dup').show();
                    $('#email').css("border-color","#a94442");
                }
                else{
                    $('#err_mail_dup').hide();
                    $('#email').removeAttr('style');
                }

                if(res[3] == "err_pass_vacio"){
                    $('#err_pass_vacio').show();
                    $('#password').css("border-color","#a94442");
                }
                else{
                    $('#err_pass_vacio').hide();
                    $('#password').removeAttr('style');
                }

                if(res[4] == "err_pass_long"){
                    $('#err_pass_long').show();
                    $('#password').css("border-color","#a94442");
                }
                else{
                    $('#err_pass_long').hide();
                    $('#password').removeAttr('style');
                }

                if(res[5] == "err_pass_exprreg"){
                    $('#err_pass_exprreg').show();
                    $('#password').css("border-color","#a94442");
                }
                else{
                    $('#err_pass_exprreg').hide();
                    $('#password').removeAttr('style');
                }


                if(res[6] == "err_perfil_vacio"){
                    $('#err_perfil_vacio').show();
                    $('#id_perfil').css("border-color","#a94442");
                }
                else{
                    $('#err_perfil_vacio').hide();
                    $('#id_perfil').removeAttr('style');
                }

                if(res[7] == "err_nombre_vacio"){
                    $('#err_nombre_vacio').show();
                    $('#FichaUsuario_nombre').css("border-color","#a94442");
                }
                else{
                    $('#err_nombre_vacio').hide();
                    $('#FichaUsuario_nombre').removeAttr('style');
                }
                if(res[8] == "err_apellido_vacio"){
                    $('#err_apellido_vacio').show();
                    $('#FichaUsuario_apellido').css("border-color","#a94442");
                }
                else{
                    $('#err_apellido_vacio').hide();
                    $('#FichaUsuario_apellido').removeAttr('style');
                }

                if(res[9] == "err_dni_vacio"){
                    $('#err_dni_vacio').show();
                    $('#FichaUsuario_dni').css("border-color","#a94442");
                }
                else{
                    $('#err_dni_vacio').hide();
                    $('#FichaUsuario_dni').removeAttr('style');
                }

                if(res[10] == "err_dni_num"){
                    $('#err_dni_num').show();
                    $('#FichaUsuario_dni').css("border-color","#a94442");
                }
                else{
                    $('#err_dni_num').hide();
                    $('#FichaUsuario_dni').removeAttr('style');
                }


                if(res[11] == "err_dni_dupl"){
                    $('#err_dni_dupl').show();
                    $('#FichaUsuario_dni').css("border-color","#a94442");
                }
                else{
                    $('#err_dni_dupl').hide();
                    $('#FichaUsuario_dni').removeAttr('style');
                }


                if(res[12] == "err_sexo_vacio"){
                    $('#err_sexo_vacio').show();
                    $('#sexo').css("border-color","#a94442");
                }
                else{
                    $('#err_sexo_vacio').hide();
                    $('#sexo').removeAttr('style');
                }

                if(res[13] == "err_fechanac_vacia"){
                    $('#err_fechanac_vacia').show();
                    $('#FichaUsuario_fechanac').css("border-color","#a94442");
                }
                else{
                    $('#err_fechanac_vacia').hide();
                    $('#FichaUsuario_fechanac').removeAttr('style');
                }
                if(res[14] == "err_fechanac_valida"){
                    $('#err_fechanac_valida').show();
                    $('#FichaUsuario_fechanac').css("border-color","#a94442");
                }
                else{
                    $('#err_fechanac_valida').hide();
                    $('#FichaUsuario_fechanac').removeAttr('style');
                }


                if(res[15] == "err_telfijo_num"){
                    $('#err_telfijo_num').show();
                    $('#FichaUsuario_telfijo').css("border-color","#a94442");
                }
                else{
                    $('#err_telfijo_num').hide();
                    $('#FichaUsuario_telfijo').removeAttr('style');
                }


                if(res[16] == "err_telemer_num"){
                    $('#err_telemer_num').show();
                    $('#FichaUsuario_telemer').css("border-color","#a94442");
                }
                else{
                    $('#err_telemer_num').hide();
                    $('#FichaUsuario_telemer').removeAttr('style');
                }
                if(res[17] == "err_direccion_vacia"){
                    $('#err_direccion_vacia').show();
                    $('#FichaUsuario_direccion').css("border-color","#a94442");
                }
                else{
                    $('#err_direccion_vacia').hide();
                    $('#FichaUsuario_direccion').removeAttr('style');
                }
                if(res[18] == "err_prov_vacia"){
                    $('#err_prov_vacia').show();
                    $('#Localidad_id_provincia').css("border-color","#a94442");
                }
                else{
                    $('#err_prov_vacia').hide();
                    $('#Localidad_id_provincia').removeAttr('style');
                }

                if(res[19] == "err_loc_vacia"){
                    $('#err_loc_vacia').show();
                    $('#Localidad_id_localidad').css("border-color","#a94442");
                }
                else{
                    $('#err_loc_vacia').hide();
                    $('#Localidad_id_localidad').removeAttr('style');
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