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
                                    <li><a href="#">Configuraci&oacute;n</a></li>
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
    <div class="form-group">
        <?php
        if($list != null) {
            echo "<div><h2>Inscripción a actividades</h2></div>";
            echo "<table class='table table-hover'>
           <thead>
            <tr>
             <tr><th>Inscribirse</th><th>Deporte</th><th>Gimnasio</th><th>Dirección</th><th>Telefonó</th><th>Días y Horarios</th></thead>";
            $cant = 0;
            $actividad_ant = 0;
            foreach($list as $gim){
                $actividad = $gim['id_actividad'];
                $deporte = Yii::app()->db->createCommand("SELECT deporte FROM deporte where id_deporte IN (SELECT id_deporte FROM actividad WHERE id_actividad = $actividad)")->queryRow();
                if($cant == 0){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td><button type='button'  value='".$actividad."' onclick='Anotarme(this.value);' class='btn btn-primary'>
                            Inscribirse
                          </button></td>";
                    $cant = 1;
                    echo "<input type='hidden' name='actividad' id='actividad' value='".$actividad."'</input>";
                    echo "<td>".$deporte['deporte']."</td>";
                    echo "<td>". $gim['nombre']."</td>";
                    echo "<td>". $gim['direccion']."</td>";
                    echo "<td>". $gim['telfijo']. "</td>";
                    echo "<td>". $gim['id_dia']."&nbsp";
                    echo $gim['hora'].':'.$gim['minutos']."&nbsp&nbsp";
                    $actividad_ant = $gim['id_actividad'];
                }
                else{
                    if($gim['id_actividad']== $actividad_ant){
                        echo $gim['id_dia'];
                        echo $gim['hora'].':'.$gim['minutos']."</td>";
                        $actividad_ant = $gim['id_actividad'];
                        echo "</tr>";
                    }
                    else{
                        echo "<tr>";
                        echo "<button  type='button'  onclick='Anotarme(this.value);' value='".$actividad."' class='btn btn-primary btn-lg'>
                            Inscribirse
                          </button>";
                        echo "<input type='hidden' id='actividad' name='actividad' value='".$actividad."'/>";
                        echo "<td>".$gim['nombre']."</td>";
                        echo "<td>".$gim['direccion']."</td>";
                        echo "<td>".$gim['telfijo']."</td>";
                        echo "<td>".$gim['id_dia']."&nbsp&nbsp";
                        echo $gim['hora'].':'.$gim['minutos']."</td>";
                        $actividad_ant = $gim['id_actividad'];
                    }
                    echo "</tbody>";
                }
                echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                        <h4 class='modal-title' id='myModalLabel'>¡Atención!</h4>
                                    </div>
                                    <div class='modal-body'>
                                        ¿Deseás anotarte?
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' id='button' onclick='ModalClick(this.value);' class='btn btn-primary'>Si</button>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                    </div>
                                </div>
                            </div>
                         </div>";

                echo "<div class='modal fade' id='Confirmacion' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                        <h4 class='modal-title' id='myModalLabel'>¡Felicidades!</h4>
                                    </div>
                                    <div class='modal-body'>
                                        ¡Te anotaste correctamente!
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal' onclick='location.reload();'>Cerrar</button>
                                    </div>
                                </div>
                            </div>
                         </div>";

                echo "<div class='modal fade' id='Error' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                        <h4 class='modal-title' id='myModalLabel'>Error</h4>
                                    </div>
                                    <div class='modal-body'>
                                        <strong>Se produjo un error al intentar inscribirte</strong>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal' onclick='location.reload();'>Cerrar</button>
                                    </div>
                                </div>
                            </div>
                         </div>";


            }
            echo "</table>";
        }
        else{
            echo "<div class='row'>
                  <div class='.col-md-6 .col-md-offset-3'>
                  <h2 class='text-center'>Ya te has inscripto a todas las actividades.</h2>
				  </div>
                  </div>";
        }
        ?>


    </div>
</div>

<script type="text/javascript">

    function Anotarme(value){
        $('#myModal').modal('show');
        $("#button").prop('value', value);
    }

</script>

<script type="text/javascript">
    function ModalClick(value){
        if(value != ""){
            var data = {'actividad': value};
            $('#myModal').modal('hide');
            $.ajax({
                url: baseurl + '/actividad/InscripcionFinal',
                type: "POST",
                data: data,
                dataType: "html",
                cache: false,
                success: function(response){
                    if(response == "error"){
                        location.reload();
                        $('#Error').modal('show');
                    }
                    if(response == "ok")
                    {
                        $('#Confirmacion').modal('show');
                    }
                }
            })


        }
    }

</script>