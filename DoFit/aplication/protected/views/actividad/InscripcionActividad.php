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
          <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/16.jpg" alt="First slide">
        </div>
    </div>
</div>
<div id="body">
  <?php 
    $cantactividades = Actividad::model()->count();
if($cantactividades > 0){
    if($actividades != NULL){
		echo  "<div><h2>Inscribite a las Actividades de DoFit!</h2></div>";
        echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
    <tr><th>Deporte</th><th>D&iacute;a</th><th>Horario</th><th>Institucion</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Telefono Fijo</th><th>Celular</th><th>Acepta mercado Pago</th><th>Valor_Actividad</th><th>Google Maps</th><th></th></tr></thead>";
    foreach($actividades as $ac){?>
        <tbody>
        <tr>
        <?php $deporte = Deporte::model()->find('id_deporte=:id_deporte',array(':id_deporte'=>$ac->id_deporte));?>
	    <td> <?php echo $deporte->deporte; ?></td>
        <?php $ah = ActividadHorario::model()->find('id_actividad='.$ac->id_actividad);
              $dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
              $cantdias = count($dias);
              $cont = 0;
              while ($cont < $cantdias){
               if($cont+1 == $ah->id_dia){
               echo "<td>$dias[$cont]</td>";
			   }
			   $cont++;
			 }?>
        <td><?php echo $ah->hora ?></td>
		<?php
		     $institucion = FichaInstitucion::model()->find('id_institucion='.$ac->id_institucion);
			 echo "<td>$institucion->nombre</td>";
			 echo "<td>$institucion->direccion</td>";
			 $id_localidad = $institucion->id_localidad; 
             $localidad = Localidad::model()->find('id_localidad='.$id_localidad);
             echo "<td>$localidad->localidad</td>";  
             $id_provincia = $localidad->id_provincia;
             $provincia = Provincia::model()->find('id_provincia='.$id_provincia);
  		     echo "<td>$provincia->provincia</td>";
			 echo "<td>$institucion->telfijo</td>";
			 echo "<td>$institucion->celular</td>";
			 echo "<td>$institucion->acepta_mp</td>";
			 echo "<td>$ac->valor_actividad</td>";?>
			 <td> <?php echo CHtml::link('Ver ubicacion!',array('FichaInstitucion/GoogleMaps','nombre'=>$institucion->nombre,'direccion'=>$institucion->direccion,'localidad'=>$localidad->localidad,'provincia'=>$provincia->provincia));?></td>
             <td><?php echo "<a href='InscripcionActividad/?id_actividad=$ac->id_actividad' class='btn btn-default'>Inscribirme!</a>"?></td>  
    </table>
<?php		
}
	}
else
{
  echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>Ya se encuentra inscripto a todas las actividades de DoFit!</h2>
                        </div>
                    </div>";
}
 }
else
{
 
  echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No se encuentran actividades creadas!</h2>
                        </div>
                   </div>";	
}				   
?>
</div>
 <br/>

	