<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'usuario-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
                    <div class="form-group">
                        <h2>Registrate, es gratis</h2>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'email',array('for'=>"exampleInputEmail1")); ?>
                            <?php echo $form->textField($model,'email',array('class'=>"form-control",'placeholder'=>"Tu email",'id'=>"exampleInputEmail1",'size'=>60,'maxlength'=>60)); ?>
                            <?php echo $form->error($model,'email',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'password'); ?>
                            <?php echo $form->passwordField($model,'password',array('class'=>"form-control",'placeholder'=>"Elegí una contraseña",'maxlength'=>15));?>
                            <?php echo $form->error($model,'password',array("class"=>"error_pw")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'Perfil'); ?>
                            <div>
                                <?php echo $form->dropDownList($model,'id_perfil',CHtml::listData(Perfil::model()->findAll(),'id_perfil','perfil'),array('empty'=>'¿Sos alumno o profesor?','class'=>"form-control"));?>
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
                            <?php echo $form->labelEx($ficha_usuario,'piso'); ?>
                            <?php echo $form->textField($ficha_usuario,'piso',array('class'=>"form-control",'placeholder'=>"¿Vivís en un piso?")); ?>
                            <?php echo $form->error($ficha_usuario,'piso'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($ficha_usuario,'depto'); ?>
                            <?php echo $form->textField($ficha_usuario,'depto',array('class'=>"form-control",'placeholder'=>"¿Vivís en un departamento?")); ?>
                            <?php echo $form->error($ficha_usuario,'depto'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($localidad,'Provincia'); ?>
                            <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
                            array('ajax'=>array('type'=>'POST',
                                  'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
                                  'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),
                                  ),'prompt'=>'Seleccione una Provincia','class'=>"form-control"));?>
                            <?php echo $form->error($localidad,'id_provincia'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($localidad,'Localidad'); ?>
                            <div>
                                <?php echo $form->dropDownList($localidad,'id_localidad',array('empty'=>"Selecciona tu localidad"),array('class'=>"form-control")); ?>
                            </div>
                            <?php echo $form->error($localidad,'id_localidad'); ?>
                        </div>
                        <div class="form-group">
                            <br>
                            <?php echo CHtml::Button($model->isNewRecord ? 'Registrate!': 'Save',array('type'=>'submit','class'=>'btn btn-primary')); ?>
                        </div>
                    </div>
                    <?php
                        echo "<div class='modal fade'  id='mensajeregistrook' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
		                        <div class='modal-dialog' role='document'>
			                        <div class='modal-content'>
			                            <div class='modal-header'>
				                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				                                <span aria-hidden='true'>&times;</span>
				                            </button>
					                        <h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
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
                    </div>
                 </div>
                <?php $this->endWidget(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
            $('#myModal').modal('show');
    });

</script>


<script type="text/javascript">
    $("#usuario-form").submit(function(){
        $.ajax({
            url :  baseurl + '/usuario/Create',
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response) {
                if(response == "actusuok"){
                    $('#mensajeregistrook').modal('show');
                }
            } ,
            error: function (e) {
                console.log(e);
            }
        });
    })
</script>