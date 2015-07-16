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
                    <a class="navbar-brand" href="#">DoFit!</a>
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/12.jpg" alt="First slide">
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
			   <?php echo $form->dropDownList($actividad,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('empty'=>'Seleccione una actividad','class'=>"form-control"));?> 
            </div>
			
			<div class="form-group">
			 <?php echo $form->labelEx($actividad,'Profesor');
			    $id_institucion = $usuarioins->id_institucion;
				$profeins = ProfesorInstitucion::model()->findAll('id_institucion=:id_institucion',array(':id_institucion'=>$id_institucion));
				$profesores = array();
				foreach ( $profeins as $proins){
                 $fu = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$proins->id_usuario));
                 array_push($profesores,'nombre',$fu->nombre);
				}
			  echo $form->dropDownList($actividad,'id_usuario',CHtml::listData($profesores,array('nombre'=>'nombre'),array('empty'=>'Seleccione un Profesor','class'=>"form-control")); 
			   
			  ?>
			</div>
             		
			<div class="form-group">
			 <?php echo $form->labelEx($actividad,'valor_actividad');?>
			 <?php echo $form->textField($actividad,'valor_actividad',array('class'=>"form-control",'placeholder'=>"Valoractividad"));?>
			</div>
					
		    <div class="form-group">
            <?php echo $form->labelEx($actividad_horario,'D&iacute;a');
            echo $form->dropDownList($actividad_horario,'id_dia',array('empty'=>'Seleccione un Día',1=>'Lunes',2=>'Martes',3=>'Miercoles',4=>'Jueves',5=>'Viernes',6=>'Sabado'),array('class'=>"form-control")); 		
			?>
			</div>
			
			<div class="form-group">
			 <?php echo $form->labelEx($actividad_horario,'Hora');?>
			 <?php echo $form->textField($actividad_horario,'hora',array('class'=>"form-control",'placeholder'=>"Hora"));?>
		    </div>
            
            <div class="form-group">
             <?php echo $form->labelEx($actividad_horario,'Minutos');?>			
			 <?php echo $form->textField($actividad_horario,'minutos',array('class'=>"form-control",'placeholder'=>"Minutos"));?> 
            </div>
           <?php echo CHtml::submitButton('Crear Actividad',array('class'=>'btn btn-primary')); ?> 		   
           <?php echo CHtml::endForm(); ?>
   </div> 			
   </div>
</div>   
<?php $this->endWidget(); ?>