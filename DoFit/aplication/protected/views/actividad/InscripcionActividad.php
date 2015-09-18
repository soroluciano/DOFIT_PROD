<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet">

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$usuario->id_usuario));
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
                    <a href='../site/index'><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola!  <?php echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci�n <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Anotarme en actividades</a></li>
                                    <li><a href="#">Ver mis actividades</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Privacidad</li>
                                    <li><a href="#">Configuraci�n</a></li>
                                    <li><a href="#"><?php echo CHtml::link('Salir', array('site/logout')); ?></a></li>
                                </ul>
                            </li>
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
            <?php echo CHtml::beginForm('InscripcionActividad','post'); ?>
            <div class="form-group">
                <?php echo $form->labelEx($deportes,'Deporte'); ?>
                <?php echo $form->dropDownList($deportes,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('empty'=>'Seleccione el deporte','class'=>"form-control","onchange"=>"BuscadorGimnasios();","id"=>"ListaDeporte"));?>
                <?php echo $form->error($deportes,'deporte')?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($provincia,'Provincia'); ?>
                <?php echo $form->dropDownList($provincia,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),array('empty'=>'Seleccione la provincia','class'=>"form-control","onchange"=>"BuscadorGimnasios();","id"=>"ListaProvincias"));?>
                <?php echo $form->error($provincia,'provincia')?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($localidad,'Localidad'); ?>
                <?php echo $form->dropDownList($localidad,'id_localidad',CHtml::listData(Localidad::model()->findAll(),'id_localidad','localidad'),array('empty'=>'Seleccione la localidad','class'=>"form-control","onchange"=>"BuscadorGimnasios();","id"=>"ListaLocalidades"));?>
                <?php echo $form->error($localidad,'localidad')?>
            </div>

           </div>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>
<?php $this->endWidget(); ?>

<script type="text/javascript">
    function BuscadorGimnasios(){
        var deporte = $("#ListaDeporte").val();
        var localidad = $("#ListaLocalidades").val();
        var provincia = $("#ListaProvincias").val();
        if(deporte != ""){
           if(provincia != ""){
               if(localidad != ""){
                   var data = {'deporte': deporte, 'provincia': provincia, 'localidad': localidad};
                   $.ajax({
                       url: baseurl + '/actividad/InscripcionActividad',
                       type: "POST",
                       data: data,
                       dataType: "html",
                       cache: false,
                       success: function (response) {
                           if (response == "error") {
                               alert('pepe');
                           }
                           else {
                               alert('jose');
                               //window.location.replace(response);
                           }

                       },
                       error: function (e) {
                           console.log(e);
                       }
                   });

               }
           }
        }


    }


</script>