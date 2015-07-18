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
                    <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Hola!  <?php echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/11.jpg" alt="First slide">
        </div>
    </div>
</div>
<div>

<?php
if($ficinstituciones !=NULL){
	 echo  "<div><h2>Adherirte a un gimnasio como profesor!</h2></div>";
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
    <tr><th>Nombre</th><th>Cuit</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Telefono Fijo</th><th>Celular</th><th>Departamento</th><th>Piso</th><th></th><th>Google Maps</th></tr></thead>";
foreach ($ficinstituciones as $ficins){ ?>
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
   <td><?php echo "<a href='Adhesiongimnasio/?id_institucion=$ficins->id_institucion' class='btn btn-default'>Enviar solicitud!</a>"?></td> 
   <td><?php echo CHtml::link('Ver ubicacion en Google Maps!',array('FichaInstitucion/GoogleMaps','nombre'=>$ficins->nombre,'direccion'=>$ficins->direccion,'localidad'=>$localidad->localidad,'provincia'=>$provincia->provincia));?></td>
   </tbody>
<?php }
}
else
{
   echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>Ya enviaste solicitudes a todas las instituciones de DoFit!</h2>
                             <h2 class='text-center'>Dirigete a cada una de ellas y consulta su estado!</h2>
						</div>
                    </div>";	
}
?>
</div>
