<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
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
            <div class="form-group">
			  <?php echo $form->labelEx($deporte,'Deporte'); ?>
			   <?php echo $form->dropDownList($deporte,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('empty'=>'Seleccione una actividad','class'=>"form-control"));?> 
            </div>
   </div>
   </div>
</div>   
<?php $this->endWidget(); ?>