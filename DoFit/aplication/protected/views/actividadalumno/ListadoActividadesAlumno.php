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
<style type="text/css">
    body {
        background: url(../img/futbol.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="principal" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actividades de <?php echo $ficha->nombre . "&nbsp". $ficha->apellido;?></h4>
            </div>
            <div class="container">
                <div class="form">
                    <div class="col-md-8">
                        <div class="form-group">
                            <br/>
							<?php if($instituciones != NULL){  ?>
                            <h5><b>Instituci&oacute;n</b></h5>
							<select id="idinstitucion" class="form-control" onchange="javascript:ConsultarActividades();">
                                <?php
                                    echo "<option value='empty' class='form-control'>Seleccione una instituci&oacute;n</option>";
                                    foreach($instituciones as $ins){
                                        echo $ins['nombre'];
                                        echo "<option  value=".$ins['id_institucion']." name=".$ins['id_institucion'].">".$ins['nombre']."</option>";
                                    }
							    }
								else{
						            echo "<h4><b>No estas inscripto en Ninguna Institución</b></h4>.";
								}	
                                ?>
                            </select>
                            <div class="form-group" id="mostraractividades">
                            </div>
                            <br/>
                            <a href="../site/index" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#principal').modal('show');
    })
</script>

<script type="text/javascript">
    function ConsultarActividades(){
        $('#mostraractividades').empty();
        var idinstitucion = $('#idinstitucion').val();
        var data = {'idinstitucion':idinstitucion};
        $.ajax({
            url: baseurl + '/actividadalumno/ConsultarActividades',
            type: "POST",
            data: data,
            dataType: "html",
            cache : false,
            success : function(response){
                $('#mostraractividades').append(response);
            }
        })
    }
</script>	
