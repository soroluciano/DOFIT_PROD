<script type="text/javascript">
  function Mostrartelefonos(idusuario){
	var idusuario = idusuario;
	var tel = "tel";
    window.open("../profesorinstitucion/Mostrardatos?idusuario="+idusuario+"&tel="+tel+"",'','width=800, height=200');
  }
  
  function Mostrardireccion(idusuario){
    var idusuario = idusuario;
    var dir = "dir";
    window.open("../profesorinstitucion/Mostrardatos?idusuario="+idusuario+"&dir="+dir+"",'','width=800, height=200');
  }  
</script>  
  
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
	$cont = 0; 
    echo "<div><h2>Profesores inscriptos en la instituci&oacute;n</h2></div>";
    echo "<table class='table table-hover'>
           <thead>
            <tr>
             <tr><th>Nombre</th><th>Apellido</th><th>Deporte que dicta</th><th>Dni</th><th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th><th>Tel&eacute;fonos</th><th>Direcci&oacute;n</th><th>Editar</th><th>Eliminar</th></tr></thead>";
	    foreach($profesores as $prof){
              	$ficha_usuario = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$prof->id_usuario));
?>
           <tbody>
            <tr>
             <td id="nombre"><?php echo $ficha_usuario->nombre ?></td>
             <td id="apellido"><?php echo $ficha_usuario->apellido ?></td>
             
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
            <td id="fecnac"><?php echo $ficha_usuario->fechanac;?></td>
			<td><a id="tel" href="" onClick="javascript:Mostrartelefonos(<?php echo $prof->id_usuario;?>);">Ver tel&eacute;fonos</a></td>
			<td><a id="dir" href="" onClick="javascript:Mostrardireccion(<?php echo $prof->id_usuario;?>);")>Ver direcci&oacute;n</a></td>
			<td id="editar"><a href="#">Editar</a></td>
            <td id="eliminar"><a href="#">Eliminar</a></td>		  
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
	
