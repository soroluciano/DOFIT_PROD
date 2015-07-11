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
                    <img class="navbar-brand" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola! </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Anotarme en actividades</a></li>
                                    <li><a href="#">Ver mis actividades</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Privacidad</li>
                                    <li><a href="#">Configuración</a></li>
                                    <li><a href="#"><?php echo CHtml::link('Salir', array('site/logout')); ?></a></li>
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
            <img class="first-slide" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
        </div>
    </div>
</div>

<div class="container">
    <div class='row'>
    </div>

<?php if($ficha_institucion !=null){
	 echo  "<div><h2>Instituciones que utilizan Do fit!</h2></div>";
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
    <tr><th>Nombre</th><th>Cuit</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Telefono Fijo</th><th>Celular</th><th>Departamento</th><th>Piso</th><th>Google Maps</th></tr></thead>";
foreach ($ficha_institucion as $ficins) {?>
   <tbody>
   <tr>
   <td><?php echo $ficins->nombre ?></td>
   <td><?php echo $ficins->cuit ?></td>
   <td><?php echo $ficins->direccion ?></td>
   <td><?php $id_localidad = $ficins->id_localidad; 
       $localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$id_localidad));
      echo $localidad->localidad;?></td>  
   <td><?php $id_provincia = $localidad->id_provincia;
        $provincia = Provincia::model()->find('id_provincia=:id_provincia',array(':id_provincia'=>$id_provincia));
        echo $provincia->provincia;?></td>		
   <td><?php echo $ficins->telfijo ?></td>
   <td><?php echo $ficins->celular?></td>
   <td><?php echo $ficins->depto?></td>
   <td><?php echo $ficins->piso?></td>
   <td><?php echo CHtml::link('Ver ubicacion en Google Maps!',array('GoogleMaps','nombre'=>$ficins->nombre,'direccion'=>$ficins->direccion,'localidad'=>$localidad->localidad,'provincia'=>$provincia->provincia));?></td>
   </tbody>
<?php }
}
else
{
   echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay Institucionescreados aun</h2>
                        </div>
                    </div>";	
}
?>
</div>