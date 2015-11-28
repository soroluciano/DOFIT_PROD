
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
                    <a href="../ProfesorInstitucion/ListadoProfesores">Listado de Profesores</a>
                </li>
                <li>
                    <a href="../institucion/ListadoAlumnosxInstitucion">Listado de Alumnos</a>
                </li>
                <li>
                    <a href="../actividad/CrearActividad">Crear Actividades</a>
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
                <li><a href="../site/LoginInstitucion">Salir</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class='row'>
        <?php
        $idinstitucion = Yii::app()->user->id;
        $profesores = ProfesorInstitucion::model()->findAll('id_institucion=:id_institucion',array(':id_institucion'=>$idinstitucion));
        if($profesores !=null){
            echo "<div><h2>Profesores inscriptos en la instituci&oacute;n</h2></div>";
            echo "<br/>";
            echo "<table class='table table-hover'>
           <thead>
            <tr>
             <tr><th>Nombre</th><th>Apellido</th><th>Dni</th><th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th><th>Tel&eacute;fonos</th><th>Direcci&oacute;n</th><th>Actividades</th><th>Eliminar Profesor</th></tr></thead>";
            foreach($profesores as $prof){
                $profesor = FichaUsuario::model()->find('id_usuario=:id_usuario',array(':id_usuario'=>$prof->id_usuario));
                ?>
                <tbody>
                <tr>
                    <input type="hidden" value="<?php echo $prof->id_usuario?>" name="idprofesor" id="idprofesor">
                    </input>
                    <input type="hidden" name="valor" id="valor"></input>
                    <td id="nombre"><?php echo $profesor->nombre;?></td>
                    <td id="apellido"><?php echo $profesor->apellido;?></td>
                    <td id="dni"><?php echo $profesor->dni; ?></td>
                    <td id="email">
                        <?php
                        $usuario = Usuario::model()->findByAttributes(array('id_usuario'=>$prof->id_usuario));
                        echo $usuario->email;?></td>
                    <td id="sexo">
                        <?php
                        if($profesor->sexo == 'M'){
                            echo "Masculino";
                        }
                        if($profesor->sexo == 'F'){
                            echo "Femenino";
                        }
                        ?>
                    </td>
                    <td id="fecnac">
                        <?php $fechanac = date("d-m-Y",strtotime($profesor->fechanac));
                        echo $fechanac;?>
                    </td>
                    <td><a id="tel" href="#" onClick="javascript:Mostrartelefonos(<?php echo $prof->id_usuario;?>);">Ver tel&eacute;fonos</a></td>
                    <td><a id="dir" href="#" onClick="javascript:Mostrardireccion(<?php echo $prof->id_usuario;?>);")>Ver direcci&oacute;n</a></td>
                    <td><a id="act" href="#" onClick="javascript:Mostraractividades(<?php echo $prof->id_usuario;?>);")>Ver Actividades</td>
                    <td><a href="" data-toggle="modal" data-target="#borrarprofemodal" >Eliminar de la institución</a></td>
                </tr>
                </tbody>
                <?php
                echo "<div class='modal fade' id='borrarprofemodal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <h4 class='modal-title' id='myModalLabel'>Inscripción</h4>
                  </div>
                  <div class='modal-body'>
                   ¿Estas seguro que desea elimnar al profesor de la instituci&oacute;n?
                  </div>
                 <div class='modal-footer'>
                  <button type='button' class='btn btn-primary' onclick='javascript:Borrarprofesor($prof->id_usuario);'>Si</button>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                </div>
              </div>
            </div>
         </div>";
                echo "<div class='modal fade'  id='mensajeerror' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				 <div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-header'>
						  <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							 <h4 class='modal-title' id='myModalLabel'>Recuperar contraseña</h4>
						 </div>
						 <div class='modal-body'>
						   Hubo un error al eliminar el profesor de la instituci&oacute;n.
						 </div>
						 <div class='modal-footer'>
							<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
						 </div>
					</div>
					</div>
				</div>
			  </div>";
                ?>
                <!-- Modal telefonos !-->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="datostelefonos" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div id="datostele">
                                        </div>
                                        <a href="../profesorinstitucion/ListadoProfesores" class="btn btn-primary">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Direccion !-->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="datosdireccion" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div id="datosdire">
                                        </div>
                                        <a href="../profesorinstitucion/ListadoProfesores" class="btn btn-primary">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Actividades !-->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="datosactividades" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div id="datosacti">
                                        </div>
                                        <a href="../profesorinstitucion/ListadoProfesores" class="btn btn-primary">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php    }
            echo "</table>";
        }
        else
        {
            echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No hay Profesores asociados a la instituci&oacute;n</h2>
                        </div>
                    </div>";
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    function Borrarprofesor(idprofesor)
    {
        var idprofesor = $('#idprofesor').val();
        var data = {"idprofesor":idprofesor};
        $.ajax({
            url :  baseurl + "/ProfesorInstitucion/BorrarProfesor",
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

<script type="text/javascript">
    function Mostrartelefonos(idusuario){
        $('#datostele').empty();
        var idusuario = idusuario;
        var data = {"idusuario":idusuario};
        $.ajax({
            url :  baseurl + "/ProfesorInstitucion/MostrarTelefonos",
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response){
                $('#datostele').append(response);
                $('#datostelefonos').modal('show');
            }
        });
    }
</script>


<script type="text/javascript">
    function Mostrardireccion(idusuario){
        $('#datosdire').empty();
        var idusuario = idusuario;
        var data = {"idusuario":idusuario};
        $.ajax({
            url :  baseurl + "/ProfesorInstitucion/MostrarDireccion",
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response){
                $('#datosdire').append(response);
                $('#datosdireccion').modal('show');
            }
        });
    }
</script>

<script type="text/javascript">
    function Mostraractividades(idusuario){
        $('#datosacti').empty();
        var idusuario = idusuario;
        var data = {"idusuario":idusuario};
        $.ajax({
            url :  baseurl + "/ProfesorInstitucion/MostrarActividades",
            type: "POST",
            dataType : "html",
            data : data,
            cache: false,
            success: function (response){
                $('#datosacti').append(response);
                $('#datosactividades').modal('show');
            }
        });
    }
</script>			 