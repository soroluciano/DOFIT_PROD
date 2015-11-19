    <?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $usuarioins = Institucion::model()->findByPk(Yii::app()->user->id);
}

?>

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
                    <li><a href="../site/LoginInstitucion">Salir</a></li>
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
<div class="container">
    <div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'actividad-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
	    <div class="col-md-8">
            <?php echo CHtml::beginForm('CrearActividad','post'); ?>
                <div class="form-group">
			        <?php
                        echo $form->labelEx($deporte,'Deporte');
                   /*     $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name'=>'deporte',
                        'value'=>'',
                        'source'=>$this->createUrl('jui/completarDeporte'),
                        // additional javascript options for the autocomplete plugin
                        'options'=>array('showAnim'=>'fold'),
                            'htmlOptions' => array('class'=>"form-control",'placeholder'=>"Ingrese el deporte"),
                    ));*/
			        $form->labelEx($deporte,'Deporte'); ?>
                    <?php echo $form->dropDownList($actividad,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('empty'=>'Seleccione el deporte','class'=>"form-control"));?>
                    <?php echo $form->error($deporte,'deporte')?>
			    </div>
			    <div class="form-group">
                    <?php echo $form->labelEx($actividad,'Profesor');
                        echo "<br>";

                        /*$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                            'name'=>'profesor',
                            'value'=>'',
                            'source'=>$this->createUrl('jui/completarProfesor'),
                            // additional javascript options for the autocomplete plugin
                            'options'=>array('showAnim'=>'fold'),
                            'htmlOptions' => array('class'=>"form-control",'placeholder'=>"Ingrese el profesor"),

                        ));*/

                        $id_institucion = $usuarioins->id_institucion;
                        $profeins = ProfesorInstitucion::model()->findAll('id_institucion=:id_institucion and id_estado = 1',array(':id_institucion'=>$id_institucion));
                        foreach ( $profeins as $proins){
                            $fu = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$proins->id_usuario));
                            echo $form->radioButtonList($actividad,'id_usuario',array($fu->id_usuario=>$fu->nombre),array( 'separator'=>' ','labelOptions'=>(array('style'=>'display:inline'))));
                            echo "<br>";
                        }
                    ?>
			    </div>
			    <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <?php echo $form->textField($actividad,'valor_actividad',array('class'=>"form-control",'placeholder'=>"Precio"));?>
                        <div class="input-group-addon">.00</div>
                    </div>
                    <br>
                    <?php echo $form->error($actividad,'valor_actividad')?>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        Lunes
                    </div>
                    <div class="col-md-1">
                        <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>1,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]' )); ?>
                    </div>
                    <div class="col-md-2">
                        <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Martes
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>2,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Miercoles
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>3,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Jueves
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>4,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Viernes
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>5,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Sábado
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>6,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Domingo
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>7,'uncheckValue'=>null,'class'=>'form-control','name'=>'dia[]')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'hora',array("00"=>"00",
    "01"=>"01",
    "02"=>"02",
    "03"=>"03",
    "04"=>"04",
    "05"=>"05",
    "06"=>"06",
    "07"=>"07",
    "08"=>"08",
    "09"=>"09",
    "10"=>"10",
    "11"=>"11",
    "12"=>"12",
    "13"=>"13",
    "14"=>"14",
    "15"=>"15",
    "16"=>"16",
    "17"=>"17",
    "18"=>"18",
    "19"=>"19",
    "20"=>"20",
    "21"=>"21",
    "22"=>"22",
    "23"=>"23",
    "24"=>"24"),array('class'=>"form-control",'name'=>'hora[]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
    "15"=>"15",
    "30"=>"30",
    "45"=>"45"),array('class'=>"form-control",'name'=>'minutos[]'));?>
                </div>
            </div>
     <br/>
           <?php echo CHtml::submitButton('Crear Actividad',array('class'=>'btn btn-primary')); ?>
            </div>
<?php echo CHtml::endForm(); ?>
        </div>
   </div> 			
   </div>
</div>   
<?php $this->endWidget(); ?>

