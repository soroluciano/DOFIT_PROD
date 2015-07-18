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
	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'actividad-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
	    <div class="col-md-8">
            <?php echo CHtml::beginForm('CrearActividad','post'); ?>
            <div class="form-group">
			  <?php echo $form->labelEx($deporte,'Deporte'); ?>
			  <?php echo $form->dropDownList($actividad,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('empty'=>'Seleccione el deporte','class'=>"form-control"));?>
              <?php echo $form->error($deporte,'deporte')?>
			</div>
			<div class="form-group">
                <?php echo $form->labelEx($actividad,'Profesor');
			    $id_institucion = $usuarioins->id_institucion;
				$profeins = ProfesorInstitucion::model()->findAll('id_institucion=:id_institucion and id_estado = 1',array(':id_institucion'=>$id_institucion));
				foreach ( $profeins as $proins){
                    $fu = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$proins->id_usuario));
				    echo $form->radioButtonList($actividad,'id_usuario',array($fu->id_usuario=>$fu->nombre),array( 'separator'=>' ','labelOptions'=>(array('style'=>'display:inline'))));
                    echo $fu->id_usuario.$fu->nombre;
                    echo "<br>";
				}
			    ?>
			</div>
			<div class="form-group">
                <?php echo $form->labelEx($actividad,'valor_actividad');?>
			    <?php echo $form->textField($actividad,'valor_actividad',array('class'=>"form-control",'placeholder'=>"Precio"));?>
                <?php echo $form->error($actividad,'valor_actividad')?> 			
			</div>

            <div class="row">
                <div class="col-md-1">
                    Lunes
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>1,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[1]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Martes
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>2,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[2]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Miercoles
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>3,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[3]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Jueves
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>4,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[4]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Viernes
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>5,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[5]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Sábado
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>6,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[6]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    Domingo
                </div>
                <div class="col-md-1">
                    <?php echo $form->checkBox($actividad_horario,'id_dia',array('value'=>7,'uncheckValue'=>0,'class'=>'form-control' )); ?>
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
                        "24"=>"24"),array('class'=>"form-control",'name'=>'Dia[7]'));?>
                </div>
                <div class="col-md-2">
                    <?php echo $form->dropDownList($actividad_horario,'minutos',array("00"=>"00",
                        "15"=>"15",
                        "30"=>"30",
                        "45"=>"45"),array('class'=>"form-control"));?>
                </div>
            </div>

           <?php echo CHtml::submitButton('Crear Actividad',array('class'=>'btn btn-primary')); ?> 		   
           <?php echo CHtml::endForm(); ?>
        </div>
   </div> 			
   </div>
</div>   
<?php $this->endWidget(); ?>
