
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest){
    //Es un usuario logueado.
    $ins = Institucion::model()->findByPk(Yii::app()->user->id);
    $fichains = FichaInstitucion::model()->find('id_institucion=:id_institucion',array(':id_institucion'=>$ins->id_institucion));
}
?>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../site/LoginInstitucion"><img class="navbar-brand-img" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_blanco.png" alt="First slide"></a>
            <a href="../" class="navbar-brand"></a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../../ProfesorInstitucion/ListadoProfesores">Listado de Profesores</a>
                </li>
                <li>
                    <a href="../../institucion/ListadoAlumnosxInstitucion">Listado de Alumnos</a>
                </li>
                <li>
                    <a href="../../actividad/CrearActividad">Crear Actividades</a>
                </li>
                <li>
                    <a href="../javascript/"></a>
                </li>
                <li>
                    <a href="../customize/"></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Bienvenido! <?php echo $fichains->nombre; ?></a></li>
                <li><a href="../../site/LoginInstitucion">Salir</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container">
    <div class='row'>
        <?php
        echo"<br>
        <br>
        <br>
        <br>
        <br>
        <br>";
        if($actividades_alumno != null) {
            echo "<table class='table table-hover'>
	            <thead>
		          <tr><th>Deporte</th><th>Día</th><th>Hora</th><th>Valor actividad</th><th>Desafectar actividad</th></tr>
		        </thead>
		        <tbody>";
            foreach ($actividades_alumno as $act_alum) {
                echo "<tr>";
                $act = Actividad::model()->findByAttributes(array('id_institucion' => $ins->id_institucion, 'id_actividad' => $act_alum->id_actividad));
                if ($act != null) {
                    echo "<input type='hidden' value='$act->id_actividad' id='idactividad'></input>";
                    echo "<input type='hidden' value='$act_alum->id_usuario' id='idalumno'></input>";
                    $deporte = Deporte::model()->findByAttributes(array('id_deporte' =>$act->id_deporte));
                    echo "<td id='depo'>$deporte->deporte</td>";
                    $act_hor = ActividadHorario::model()->findByAttributes(array('id_actividad' => $act->id_actividad));
                    $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                    $id_dia = $act_hor->id_dia;
                    echo "<td id='dia'>$dias[$id_dia]</td>";
                    ?>
                    <td id='hora'><?php echo $act_hor->hora.':'.($act_hor->minutos == '0' ? '0'.$act_hor->minutos : $act_hor->minutos);?></td>
                    <td id='valor'><?php echo  $act->valor_actividad;?></td>
                    <td id='elim'><a href="" data-toggle="modal" data-target="#myModal">Desafectar actividad</a></td>
                    <?php
                    echo "
                     <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
						<div class='modal-dialog' role='document'>
						 <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <h4 class='modal-title' id='myModalLabel'>Inscripción</h4>
                  </div>
                  <div class='modal-body'>
                   ¿Estas seguro que desea desafectar al alumno de la actividad?
                  </div>
                 <div class='modal-footer'>
                  <button type='button' class='btn btn-primary' onclick='javascript:desafectaractividad();'>Si</button>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                </div>
              </div>
            </div>
         </div>";
                }
                echo "</tr>";
            }
            echo "</tbody>
	           </table>";
        }
        else
        {
            echo "<h3>El usuario no se inscribio en ninguna actividad</h3><br/>";
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    function desafectaractividad()
    {
        var idactividad = $('#idactividad').val();
        var idalumno = $('#idalumno').val();
        var data = {"idactividad":idactividad,"idalumno":idalumno};
        $.ajax({
            url :  baseurl + "/actividadalumno/DesafectarActividad",
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response){
                if(response == "ok"){
                    location.reload();
                }
                if (response == "error"){
                    $('#mensajeerror').modal('show');
                }
            }	,
            error: function (e) {
                console.log(e);
            }
        });

    }
</script>	
			   