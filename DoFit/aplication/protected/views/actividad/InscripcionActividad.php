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
    <form class="form" method="post" action="ListaDeInscripcion">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'actividad-form', 'enableAjaxValidation'=>false, 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));?>
        <div class="col-md-8">
            <?php echo CHtml::beginForm('InscripcionActividad','post'); ?>
            <div class="form-group">
                <?php echo $form->labelEx($deportes,'Deporte'); ?>
                <?php echo $form->dropDownList($deportes,'id_deporte',CHtml::listData(Deporte::model()->findAll(),'id_deporte','deporte'),array('empty'=>'Seleccione el deporte','class'=>"form-control","onchange"=>"BuscadorGimnasios();","id"=>"ListaDeporte","name"=>"deporte"));?>
                <?php echo $form->error($deportes,'deporte')?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($localidad,'Provincia'); ?>
                <?php echo $form->dropDownList($localidad,'id_provincia',CHtml::listData(Provincia::model()->findAll(),'id_provincia','provincia'),
                    array('ajax'=>array('type'=>'POST',
                        'url'=>CController::createUrl('Usuario/SeleccionarLocalidad'),
                        'update'=>'#'.CHtml::activeId($localidad,'id_localidad'),
                    ),'prompt'=>'Seleccione una Provincia','class'=>"form-control","onchange"=>"BuscadorGimnasios();"));?>
                <?php echo $form->error($localidad,'id_provincia'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($localidad,'Localidad'); ?>
                <div>
                    <?php echo $form->dropDownList($localidad,'id_localidad',array(''=>"Selecciona tu localidad"),array('class'=>"form-control","onchange"=>"BuscadorGimnasios();")); ?>
                </div>
                <?php echo $form->error($localidad,'id_localidad'); ?>
            </div>
            <div id="map" style="width: 700px; height: 400px;">
            </div>
            <br>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="boton" style="display:none" value="Anotarme"/>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lo sentimos :( </h4>
                        </div>
                        <div class="modal-body">
                           ¡No encontramos resultados para tu búsqueda!
                            Intentá de nuevo
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php echo CHtml::endForm(); ?>
<?php $this->endWidget(); ?>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDGuKpwaC15M3ivyOjCgU6_yvwpI8UWWE&callback=initMap">
</script>

<script type="text/javascript">
    function BuscadorGimnasios(){
        var deporte = $("#ListaDeporte").val();
        var localidad = $("#Localidad_id_localidad").val();
        var provincia = $("#Localidad_id_provincia").val();
        $("#boton").hide();
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
                               $("#map").hide();
                               $("#boton").hide();
                               $('#myModal').modal('show');
                           }
                           else {
                               $("#map").show();
                               var locations = JSON.parse("[" + response + "]");;

                               var map = new google.maps.Map(document.getElementById('map'), {
                                   zoom: 13,
                                   center: new google.maps.LatLng(locations[0][1], locations[0][2] ),
                                   mapTypeId: google.maps.MapTypeId.ROADMAP
                               });

                               var infowindow = new google.maps.InfoWindow();

                               var marker, i;

                               for (i = 0; i < locations.length; i++) {
                                   marker = new google.maps.Marker({
                                       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                       map: map,
                                       animation: google.maps.Animation.BOUNCE


                                   });

                                   google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                       return function() {
                                           infowindow.setContent(locations[i][0]);
                                           infowindow.open(map, marker);
                                       }
                                   })(marker, i));

                               }
                               $("#boton").show();
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