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
                   <a href='../aplication'> <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"></li>
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Home</a></li>
									<li><a href="../ProfesorInstitucion/ListadoProfesores">Ver listado de Profesores</a></li>
                                    <li><a href="#">Ver listado de Alumnos</a></li>  
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/17.jpg" alt="First slide">
        </div>
    </div>
</div>
<div class="container">
  <div class='row'>

<?php 
$idinstitucion = Yii::app()->user->id;
$profesores = ProfesorInstitucion::model()->findAll('id_institucion=:id_institucion',array(':id_institucion'=>$idinstitucion));
 if($profesores !=null){
    echo "<div><h2>Profesores inscriptos en la institucion</h2></div>";
    echo "<table class='table table-hover'>
           <thead>
            <tr>
             <tr><th>Nombre</th><th>Apellido</th><th>Deporte que Dicta</th><th>Dni</th><th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th><th>Tel&eacute;fono Fijo</th><th>Celular</th><th>Contacto Emergencia</th><th>Direcci&oacute;n</th><th>Localidad</th><th>Provinicia</th></tr></thead>";
	    foreach($profesores as $prof){
              	$ficha_usuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$prof->id_usuario));
?>
           <tbody>
            <tr>
             <td  width="100%" id="nombre"><?php echo $ficha_usuario->nombre ?></td>
             <td id="cuit"><?php echo $ficha_usuario->apellido ?></td>
             
			 <td id="deporte">
			   <?php 
			    $actividad = Actividad::model()->findByAttributes(array('id_usuario'=>$prof->id_usuario));
			      if($actividad == null){
					  echo "No se asocio a ninguna actividad";
			       }
				   else {
			        $deporte = Deporte::model()->findByAttributes(array('id_deporte'=>$actividad->id_deporte));
		            echo $deporte->deporte;
				   }
			   ?>
			 <td id="dni"><?php echo $ficha_usuario->dni ?></td>
             <td id="email">
			  <?php 
			    $usuario = Usuario::model()->findByAttributes(array('id_usuario'=>$prof->id_usuario));
				echo $usuario->email?></td>
             <td id="sexo">
              <?php 
               if($ficha_usuario->sexo == 'M'){
                  echo "Masculino";
               }
              if($ficha_usuario->sexo == 'F'){
                 echo "Femenino";
               }  					   
              ?>
             </td>
            <td id="fecnac"><?php echo $ficha_usuario->fechanac?></td>
            <td id="telfijo"><?php echo $ficha_usuario->telfijo ?></td>
            <td id="celular"><?php echo $ficha_usuario->celular?></td>
            <td id="conemer"><?php echo $ficha_usuario->conemer?></td>
            <td id="direccion"><?php echo $ficha_usuario->direccion?></td>
            <td id="localidad"><?php $id_localidad = $ficha_usuario->id_localidad;   
              $localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$id_localidad));
              echo $localidad->localidad;?></td>  
           <td id="provincia"><?php $id_provincia = $localidad->id_provincia;
             $provincia = Provincia::model()->find('id_provincia=:id_provincia',array(':id_provincia'=>$id_provincia));
             echo $provincia->provincia;?></td>		
           <td id="depto"><?php echo $ficha_usuario->depto?></td>
           <td id="piso"><?php echo $ficha_usuario->piso?></td>
          </tr> 
        </tbody>
<?php 
    }
   echo "</table>";
 }
else
{
   echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay Profesores asociados a la institucion</h2>
                        </div>
                    </div>";	
}
?>
   </div>
</div>
