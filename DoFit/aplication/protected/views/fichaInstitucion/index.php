<script type="text/javascript">
    

    function mostrarmapa(contador){
	   debugger;
		var nombre = $('#nombre'+contador).html();
		var cuit = $('#cuit'+contador).html();
	    var direccion = $('#direccion'+contador).html();
		var localidad = $('#localidad'+contador).html();
        var provincia = $('#provincia'+contador).html();
        window.open("fichaInstitucion/googlemaps?nombre="+nombre+"&direccion="+direccion+"&localidad="+localidad+"&provincia="+provincia+"",'','width=600, height=550');
        
      
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
            <img class="first-slide_min" src="<?php echo Yii::app()->request->baseUrl; ?>/img/17.jpg" alt="First slide">
        </div>
    </div>
</div>
<div>

<div class="container">
    <div class='row'>

<?php if($ficha_institucion !=null){
   $cont = 0; // contador de registros
  	echo  "<div><h2>Instituciones que utilizan Do fit!</h2></div>";
		echo    "<table class='table table-hover'>
                        <thead>
                            <tr>
    <tr><th>Nombre</th><th>Cuit</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Telefono Fijo</th><th>Celular</th><th>Departamento</th><th>Piso</th><th>Google Maps</th></tr></thead>";
foreach ($ficha_institucion as $ficins) {
?>
   <tbody>
    <?php $cont++;?>
   <form onsubmit="mostrarmapa(<?php echo $cont?>);"  name="formulario" id="formulario" method="post">
   <tr>
   <td id="nombre<?php echo $cont?>"><?php echo $ficins->nombre ?></td>
   <td id="cuit<?php echo $cont?>"><?php echo $ficins->cuit ?></td>
   <td id="direccion<?php echo $cont?>"><?php echo $ficins->direccion ?></td>
   <td id="localidad<?php echo $cont?>"><?php $id_localidad = $ficins->id_localidad; 
       $localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$id_localidad));
      echo $localidad->localidad;?></td>  
   <td id="provincia<?php echo $cont?>"><?php $id_provincia = $localidad->id_provincia;
        $provincia = Provincia::model()->find('id_provincia=:id_provincia',array(':id_provincia'=>$id_provincia));
        echo $provincia->provincia;?></td>		
   <td id="telfijo<?php echo $cont?>"><?php echo $ficins->telfijo ?></td>
   <td id="celular<?php echo $cont?>"><?php echo $ficins->celular?></td>
   <td id="depto<?php echo $cont?>"><?php echo $ficins->depto?></td>
   <td id="piso<?php echo $cont?>"><?php echo $ficins->piso?></td>
   <td><input type="submit" value="Ver Ubicación en Google Maps!"></input></td>
   </form>
  </tbody>
<?php 
}
echo "</table>";
}
else
{
   echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay Instituciones creadas aún</h2>
                        </div>
                    </div>";	
}
?>
</div>

</div>