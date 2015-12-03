<html>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/carrousel.css" rel="stylesheet"></link>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<script type="text/javascript">

    $( window ).load(function() {
        info();
    });
</script>

<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide">
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                  <li><a href="">Bienvenido! <?php 
				                  if(!Yii::app()->user->isGuest){
	                                  //Es un usuario logueado.
	                                  $Us = Usuario::model()->findByPk(Yii::app()->user->id); 
	                                 $ficha = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$Us->id_usuario));
                                    }
								  echo $ficha->nombre."&nbsp".$ficha->apellido; ?></a></li>
                <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
            </ul>
        </nav>
    </div>
</header>
<br/>
<br/>
<br/>
<br/>
<div class="container">
    <div class="form">
        <div class="col-md-8">
            <div class="form-group">
                <h3> Actividades dictadas por <?php echo $ficha->nombre . "&nbsp" . $ficha->apellido; ?></h3>
                <br/>
                <h5><b>Instituci&oacute;n</b></h5>
                <select id="idinstitucion" class="form-control" onchange="javascript:ConsultarActividadesInscripto();">
                    <?php
                    if(!Yii::app()->user->isGuest){
                        echo "<option value='empty' class='form-control'>Seleccione una instituci&oacute;n</option>";
                        foreach($instituciones as $ins){
                            echo $ins['nombre'];
                            echo "<option  value=".$ins['id_institucion']." name=".$ins['id_institucion'].">".$ins['nombre']."</option>";
                        }
                    }
                    ?>
                </select>
                <br/>
                <div class="form-group" id="mostraractividades">
                </div>
                <br/>
                <a href="../site/index" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="principal" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><a href="../profesorinstitucion/ListadoActividades">&times;</a></span></button>
                <h4 class="modal-title">Alumnos Inscriptos en la actividad</h4>
            </div>
            <div class="container">

                <div class="col-md-8">
                    <div class="form-group">
                        <div id="actaluminsc">
                        </div>
                        <a href="../profesorinstitucion/ListadoActividades" class="btn btn-primary">Volver</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal Error -->
<div class='modal fade' id='erroractividades' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>¡Error!</h4>
            </div>
            <div class='modal-body'>
                No dictas ninguna actividad para esa Instituci&oacute;n
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>
</html>

<script type="text/javascript">
    function ConsultarActividadesInscripto()
    {
        $('#mostraractividades').empty();
        var idinstitucion = $('#idinstitucion').val();
        var data = {'idinstitucion':idinstitucion};
        $.ajax({
            url: baseurl + '/profesorinstitucion/ConsultarActividadesInscripto',
            type: "POST",
            data: data,
            dataType: "html",
            cache : false,
            success : function(response){
                if(response == "error"){
                    $('#erroractividades').modal('show');
                }
                else{
                    $('#mostraractividades').append(response);
                }
            }
        })
    }
</script>

<script type="text/javascript">
    function AlumnosInscriptos(idactividad)
    {
        $('#actaluminsc').empty();
        var id_actividad = idactividad;
        var data = {'idactividad':id_actividad};
        $.ajax({
            url: baseurl + '/profesorinstitucion/AlumnosInscriptosActividad',
            type: "POST",
            data: data,
            dataType: "html",
            cache : false,
            success : function(response){
                $('#actaluminsc').append(response);
                $('#principal').modal('show');
            }
        })
    }
</script>
  